<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BudgetCategories;
use App\Models\Finset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class BudgetCategoriesController extends Controller
{
    /**
     * Get all Budget Categories
     */
    public function index() {
        $budget_categories = BudgetCategories::orderBy('created_at', 'desc')->paginate(5);
        
        return view( 'admin.budget-categories.index', compact( 'budget_categories' ) );
    }

    /**
     * create new Budget Categories
     */
    public function create() {
        $budget_categories = BudgetCategories::all();
        $finsets = Finset::all();

        return view( 'admin.budget-categories.create', compact( 'budget_categories', 'finsets' ) );
    }

    /**
     * store new Budget Categories
     */
    public function store( Request $request ) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'value' => 'required|numeric',
        ]);

        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // dd( $request->all() );
            $budget_category = new BudgetCategories;
            $current_user_id = Auth::user()->id;

            $budget_category->user_id = $current_user_id;
            $budget_category->name = $request->name;
            $budget_category->finset_id = (int) $request->finset;
            $budget_category->parent_id = (int) $request->parent_cat;
            $budget_category->status = (int) $request->status;
            $budget_category->value = (float) $request->value;
            $budget_category->scope = $request->scope;

            $budget_category->save();

            return redirect()->back()->with( 'success', 'New Budget Category has been created' );
        }
    }
    /**
     * edit new Budget Categories
     */
    public function edit( $id ) {
        
        $budget_categories = BudgetCategories::all();
        $finsets = Finset::all();
        $current_category = BudgetCategories::find( $id );
        if ( !$current_category ) {
            abort( 404 );
        }
        return view( 'admin.budget-categories.edit', compact( 'budget_categories', 'finsets', 'current_category' ) );
    }
    
    /**
     * update new Budget Categories
     */
    public function update( Request $request, $id ) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'value' => 'required|numeric',
        ]);

        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // dd( $request->all() );
            $budget_category = BudgetCategories::find( $id );
            $current_user_id = Auth::user()->id;

            $budget_category->user_id = $current_user_id;
            $budget_category->name = $request->name;
            $budget_category->finset_id = (int) $request->finset;
            $budget_category->parent_id = (int) $request->parent_cat;
            $budget_category->value = (float) $request->value;
            $budget_category->status = (int) $request->status;
            $budget_category->scope = $request->scope;

            $budget_category->save();

            return redirect()->back()->with( 'success', 'Budget Category has been updated' );
        }
    }

    /**
     * delete new Budget Categories
     */
    public function delete( Request $request, $id ) {
        $current_category = BudgetCategories::find( $id );
        if ( !$current_category ) {
            abort( 404 );
        }
        $current_category->delete();
        
        return redirect()->back()->with( 'error', 'The category has been deleted' );
    }

}


