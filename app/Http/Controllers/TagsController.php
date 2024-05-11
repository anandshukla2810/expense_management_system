<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finset;
use App\Models\Tags;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TagsController extends Controller
{
    /**
     * Get all Tags
     */
    public function index() {
        $tags = Tags::orderBy('created_at', 'desc')->paginate(5);
        
        return view( 'admin.tags.index', compact( 'tags' ) );
    }

    /**
     * create new Tags
     */
    public function create() {
        $tags = Tags::all();
        $finsets = Finset::all();

        return view( 'admin.tags.create', compact( 'tags', 'finsets' ) );
    }

    /**
     * store new Tags
     */
    public function store( Request $request ) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $tag = new Tags;

            $tag->name = $request->name;
            $tag->finset_id = (int) $request->finset;
            $tag->status = (int) $request->status;
            $tag->save();

            return redirect()->back()->with( 'success', 'New tag has been created' );
        }
    }
    /**
     * edit new Tags
     */
    public function edit( $id ) {
        
        $current_tag = Tags::find( $id );
        $finsets = Finset::all();
        
        if ( !$current_tag ) {
            abort( 404 );
        }

        return view( 'admin.tags.edit', compact( 'current_tag', 'finsets' ) );
    }
    
    /**
     * update new Tags
     */
    public function update( Request $request, $id ) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $tag = Tags::find( $id );
            
            $tag->name = $request->name;
            $tag->finset_id = (int) $request->finset;
            $tag->status = (int) $request->status;

            $tag->save();

            return redirect()->back()->with( 'success', 'Tag has been updated' );
        }
    }

    /**
     * delete new Tags
     */
    public function delete( Request $request, $id ) {
        $tag = Tags::find( $id );
        if ( !$tag ) {
            abort( 404 );
        }
        $tag->delete();
        
        return redirect()->back()->with( 'error', 'The tag has been deleted' );
    }

}
