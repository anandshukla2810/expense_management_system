<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendors;
use App\Models\Finset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VendorsController extends Controller
{
    /**
     * Get all Vendors
     */
    public function index() {
        $vendors = Vendors::orderBy('created_at', 'desc')->paginate(5);
        
        return view( 'admin.vendors.index', compact( 'vendors' ) );
    }

    /**
     * create new Vendors
     */
    public function create() {
        $finsets = Finset::all();

        return view( 'admin.vendors.create', compact( 'finsets' ) );
    }

    /**
     * store new Vendors
     */
    public function store( Request $request ) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $vendors = new Vendors;

            $vendors->name = $request->name;
            $vendors->finset_id = (int) $request->finset;
            $vendors->status = (int) $request->status;
            $vendors->save();

            return redirect()->back()->with( 'success', 'New vendor has been created' );
        }
    }
    /**
     * edit new Vendors
     */
    public function edit( $id ) {
        
        $current_vendor = Vendors::find( $id );
        $finsets = Finset::all();
        
        if ( !$current_vendor ) {
            abort( 404 );
        }

        return view( 'admin.vendors.edit', compact( 'current_vendor', 'finsets' ) );
    }
    
    /**
     * update new Vendors
     */
    public function update( Request $request, $id ) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $vendor = Vendors::find( $id );
            
            $vendor->name = $request->name;
            $vendor->finset_id = (int) $request->finset;
            $vendor->status = (int) $request->status;

            $vendor->save();

            return redirect()->back()->with( 'success', 'Vendor has been updated' );
        }
    }

    /**
     * delete new Vendors
     */
    public function delete( Request $request, $id ) {
        $vendor = Vendors::find( $id );
        if ( !$vendor ) {
            abort( 404 );
        }
        $vendor->delete();
        
        return redirect()->back()->with( 'error', 'The vendor has been deleted' );
    }

}
