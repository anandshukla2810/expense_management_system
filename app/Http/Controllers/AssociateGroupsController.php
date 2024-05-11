<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendors;
use App\Models\Finset;
use App\Models\AssociationGroups;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AssociateGroupsController extends Controller
{
    /**
     * Get all AssociationGroups
     */
    public function index() {
        $association_groups = AssociationGroups::orderBy('created_at', 'desc')->paginate(5);
        
        return view( 'admin.association-group.index', compact( 'association_groups' ) );
    }

    /**
     * create new AssociationGroups
     */
    public function create() {
        $finsets = Finset::all();

        return view( 'admin.association-group.create', compact( 'finsets' ) );
    }

    /**
     * store new AssociationGroups
     */
    public function store( Request $request ) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $association_group = new AssociationGroups;

            $association_group->name = $request->name;
            $association_group->finset_id = (int) $request->finset;
            $association_group->status = (int) $request->status;
            $association_group->save();

            return redirect()->back()->with( 'success', 'New association group has been created' );
        }
    }
    /**
     * edit new AssociationGroups
     */
    public function edit( $id ) {
        
        $current_group = AssociationGroups::find( $id );
        $finsets = Finset::all();
        
        if ( !$current_group ) {
            abort( 404 );
        }

        return view( 'admin.association-group.edit', compact( 'current_group', 'finsets' ) );
    }
    
    /**
     * update new AssociationGroups
     */
    public function update( Request $request, $id ) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $association_group = AssociationGroups::find( $id );
            
            $association_group->name = $request->name;
            $association_group->finset_id = (int) $request->finset;
            $association_group->status = (int) $request->status;

            $association_group->save();

            return redirect()->back()->with( 'success', 'Association group has been updated' );
        }
    }

    /**
     * delete new AssociationGroups
     */
    public function delete( Request $request, $id ) {
        $association_group = AssociationGroups::find( $id );
        if ( !$association_group ) {
            abort( 404 );
        }
        $association_group->delete();
        
        return redirect()->back()->with( 'error', 'The association group has been deleted' );
    }

}
