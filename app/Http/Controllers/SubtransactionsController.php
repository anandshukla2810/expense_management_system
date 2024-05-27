<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BudgetCategories;
use App\Models\Vendors;
use App\Models\Sub_transactions;
use App\Models\Sub_transaction_tags;
use App\Models\Finset;
use App\Models\Tags;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SubtransactionsController extends Controller
{
    /**
     * Get all Transactions
     */
    public function index(){
        $subTransactions = DB::table('sub_transactions')
            ->leftJoin('sub_transaction_tags', 'sub_transactions.id', '=', 'sub_transaction_tags.id')
            ->leftJoin('tags', 'sub_transaction_tags.tag_id', '=', 'tags.id')
            ->leftJoin('finsets', 'finsets.id', '=', 'sub_transactions.finset_id')
            ->select('*', 'tags.name as tag_name')
            ->where('sub_transactions.id', '>', 1)
            ->get();
        return view('admin.subtransactions.index');
    }
    public function create(){
        $finsets = Finset::all();
        $budget_categories = BudgetCategories::all();
        $vendors = Vendors::all();
        $sub_transaction_tags = Sub_transaction_tags::all();
        $tags = Tags::all();
        // dd($finsets->toArray(), $sub_transaction_tags->toArray());
        return view('admin.subtransactions.create', compact( 'finsets' ) );
    }

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
