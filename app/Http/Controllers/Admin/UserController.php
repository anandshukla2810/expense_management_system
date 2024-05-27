<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::orderBy('id', 'desc')->paginate(20);
        return view('admin.user.index', compact('data'));
    }

    public function create()    
    {
        $admins = User::where('usertype', 'admin')->get();
        return view('admin.user.create', compact('admins'));
    }

    public function store(Request $request)
    {
        // if($files = $request->file('logo')){
        //     $logo = $files->getClientOriginalName();
        //     $logo_name = now()->timestamp.'_'.$logo;
        //     $files->move('images', $logo_name);  
        // }
        // else{
        //     $logo_name = "";
        // }

        $full_name = $request->fname.' '.$request->lname;

        User::create([
            'name' => $full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_by' => auth()->user()->id,
            'status' => 1,
        ]);
        
        return redirect()->route('users')->with('message', 'User added successfully');
    }

    public function edit($id)
    {
        $data = User::find($id);
        if ( !$data ) {
            abort( 404 );
        }

        return view('admin.user.edit', compact('data'));
    }

    public function update(Request $request)
    {
        // if($files = $request->file('logo')){
        //     $logo = $files->getClientOriginalName();
        //     $logo_name = now()->timestamp.'_'.$logo;
        //     $files->move('images', $logo_name);

        //     $previous_logo = User::where('id', $request->id)->value('logo');
        //     $path = 'images/'.$previous_logo;
        //     if(File::exists(public_path($path))){
        //         File::delete(public_path($path));
        //     }

        //     User::where('id', $request->id)->update([
        //         'logo' => $logo_name,
        //     ]);
        // }

        $full_name = $request->fname.' '.$request->lname;

        User::where('id', $request->id)->update([
            'name' => $full_name,
            'email' => $request->email,
            'created_by' => auth()->user()->id,
            'status' => 1,
        ]);

     
        return redirect()->route('users')->with('message', 'User updated successfully');
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('users')->with('message', 'School deleted successfully');
    }
}
