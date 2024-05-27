<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BudgetCategories;
use App\Models\Vendors;
use App\Models\Accounts;
use App\Models\Finset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AccountvalueController extends Controller
{
    /**
     * Get all Transactions
     */
    public function index(){
        $accounts = Accounts::all();
        return view('admin.accountvalue.index', compact('accounts'));
    }
    public function create(){
        $finsets = Finset::all();
        return view('admin.accountvalue.create', compact('finsets'));
    }

    /**
     * store new Accoutnts Details
     */
    public function store( Request $request ) {
        $validator = Validator::make($request->all(), [
            'finset_id' => 'required|numeric',
            'current_value' => 'required|numeric',
            'account_id' => 'required',
        ], [
            'finset_id.required' => 'The value field is required.',
            'finset_id.numeric' => 'The value field accepts only numbers.',
            'current_value.required' => 'The value field is required.',
            'current_value.numeric' => 'The value field accepts only numbers.',
            'account_id.required' => 'The date field is required.',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $accounts = new Accounts;
            $accounts->finset_id = (int) $request->finset_id;
            $accounts->current_value = (float) $request->current_value;
            $accounts->account_id = (int) $request->account_id;
            $accounts->status = (int) 1;
            $accounts->save();
            return redirect()->back()->with( 'success', 'New account details has been created' );
        }
    }

    /**
     * edit new Accounts
     */
    public function edit( $id ) {
        $accounts = Accounts::find( $id );
        $finsets = Finset::all();
        return view( 'admin.accountvalue.edit', compact( 'accounts', 'finsets') );
    }

    /**
     * Update Account Details
     */
    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'finset_id' => 'required|numeric',
            'current_value' => 'required|numeric',
            'account_id' => 'required',
        ], [
            'finset_id.required' => 'The value field is required.',
            'finset_id.numeric' => 'The value field accepts only numbers.',
            'current_value.required' => 'The value field is required.',
            'current_value.numeric' => 'The value field accepts only numbers.',
            'account_id.required' => 'The date field is required.',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $accounts = Accounts::find($id);
            $accounts->finset_id = (int) $request->finset_id;
            $accounts->current_value = (float) $request->current_value;
            $accounts->account_id = (int) $request->account_id;
            $accounts->status = (int) $request->status;
            $accounts->save();
            return redirect()->back()->with( 'success', 'Account details has been updated' );
        }
    }

    /**
     * delete new Accounts
     */
    public function delete( Request $request, $id ) {
        $accounts = Accounts::find( $id );
        if ( !$accounts ) {
            abort( 404 );
        }
        $accounts->delete();
        
        return redirect()->back()->with( 'error', 'The account has been deleted' );
    }
}