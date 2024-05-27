<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BudgetCategories;
use App\Models\Vendors;
use App\Models\Transactions;
use App\Models\Finset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubtransactiontagController extends Controller
{
    /**
     * Get all Transactions
     */
    public function index(){
        return view('admin.subtransactionstag.index');
    }
    public function create(){
        return view('admin.subtransactionstag.create');
    }

    // public function index() {
    //     $transactions = Transactions::orderBy('created_at', 'desc')->paginate(5);
        
    //     return view( 'admin.transactions.index', compact( 'transactions' ) );
    // }

    // /**
    //  * create new Transactions
    //  */
    // public function create() {
    //     $finsets = Finset::all();
    //     $budget_categories = BudgetCategories::all();

    //     return view( 'admin.transactions.create', compact( 'finsets', 'budget_categories' ) );
    // }

    // /**
    //  * store new Transactions
    //  */
    // public function store( Request $request ) {
    //     $validator = Validator::make($request->all(), [
    //         'value' => 'required|numeric',
    //     ]);

        
    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     } else {
    //         $transaction = new Transactions;
    //         $transaction->category_id = (int) $request->category;
    //         $transaction->transaction_id = (int) 0;
    //         $transaction->value = (float) $request->value;
    //         $transaction->status = (int) $request->status;
    //         $transaction->save();

    //         return redirect()->back()->with( 'success', 'New transaction has been created' );
    //     }
    // }
    // /**
    //  * edit new Transactions
    //  */
    // public function edit( $id ) {
        
    //     $current_transaction = Transactions::find( $id );
    //     $finsets = Finset::all();
    //     $budget_categories = BudgetCategories::all();
        

    //     if ( !$current_transaction ) {
    //         abort( 404 );
    //     }

    //     return view( 'admin.transactions.edit', compact( 'current_transaction', 'finsets', 'budget_categories' ) );
    // }
    
    // /**
    //  * update new Transactions
    //  */
    // public function update( Request $request, $id ) {   
    //     $validator = Validator::make($request->all(), [
    //         'value' => 'required|numeric',
    //     ]);

        
    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     } else { 
    //         $transaction = Transactions::find( $id );
    //         $transaction->category_id = (int) $request->category;
    //         $transaction->value = (float) $request->value;
    //         $transaction->status = (int) $request->status;

    //         $transaction->save();

    //         return redirect()->back()->with( 'success', 'Transaction has been updated' );
    //     }
    // }

    // /**
    //  * delete new Transactions
    //  */
    // public function delete( Request $request, $id ) {
    //     $transaction = Transactions::find( $id );
    //     if ( !$transaction ) {
    //         abort( 404 );
    //     }
    //     $transaction->delete();
        
    //     return redirect()->back()->with( 'error', 'The transaction has been deleted' );
    // }

}
