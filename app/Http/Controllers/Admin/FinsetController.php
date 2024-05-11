<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Finset;

class FinsetController extends Controller
{
    public function index()
    {
        $data = Finset::orderBy('id', 'desc')->paginate(20);
        return view('admin.finset.index', compact('data'));
    }

    public function create()
    {
        return view('admin.finset.create');
    }

    public function store(Request $request)
    {
        $status = ((int)$request->status);

        Finset::create([
            'name' => $request->name,
            'status' => $status,
        ]);
        
        return redirect()->route('finset')->with('message', 'Finset added successfully');
    }

    public function edit($id)
    {
        $data = Finset::where('id', $id)->first();
        
        return view('admin.finset.edit', compact('data'));
    }

    public function update(Request $request)
    {
        Finset::where('id', $request->id)->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);

     
        return redirect()->route('finset')->with('message', 'Finset updated successfully');
    }

    public function delete($id)
    {
        Finset::where('id', $id)->delete();
        return redirect()->route('finset')->with('message', 'School deleted successfully');
    }
}
