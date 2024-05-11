<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounts;
use App\Models\Finset;
use App\Models\Tags;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AccountsController extends Controller
{
    /**
     * Get all Accounts
     */
    public function index() {
        $accounts = Accounts::orderBy('created_at', 'desc')->paginate(5);
        
        return view( 'admin.accounts.index', compact( 'accounts' ) );
    }

    /**
     * create new Accounts
     */
    public function create() {
        $finsets = Finset::all();

        return view( 'admin.accounts.create', compact( 'finsets' ) );
    }

    /**
     * store new Accounts
     */
    public function store( Request $request ) {
        $validator = Validator::make($request->all(), [
            'current_value' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $account = new Accounts;

            $account->account_id = (string) $request->account_id;
            $account->current_value = (float) $request->current_value;
            $account->finset_id = (int) $request->finset;
            $account->status = (int) $request->status;
            $account->save();

            return redirect()->back()->with( 'success', 'New account has been created' );
        }
    }
    /**
     * edit new Accounts
     */
    public function edit( $id ) {
        
        $current_account = Accounts::find( $id );
        $finsets = Finset::all();
        
        if ( !$current_account ) {
            abort( 404 );
        }

        return view( 'admin.accounts.edit', compact( 'current_account', 'finsets' ) );
    }
    
    /**
     * update new Accounts
     */
    public function update( Request $request, $id ) {
        $validator = Validator::make($request->all(), [
            'current_value' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $account = Accounts::find( $id );
            
            $account->account_id = (string) $request->account_id;
            $account->current_value = (float) $request->current_value;
            $account->finset_id = (int) $request->finset;
            $account->status = (int) $request->status;

            $account->save();

            return redirect()->back()->with( 'success', 'Account has been updated' );
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
