<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\School;
use App\Models\PlanType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class SchoolController extends Controller
{
    public function set_school(Request $reqest)
    {
        User::where('id', auth()->user()->id)->update([
            'school_id' => $reqest->school_id,
        ]);
        return redirect()->back();
    }

    public function index()
    {
        $data = School::orderBy('id', 'desc')->paginate(20);
        return view('admin.schools.index', compact('data'));
    }

    public function create()
    {
        $plan_types = PlanType::where('status', 1)->get();
        $admins = User::where('usertype', 'school_admin')->get();
        return view('admin.schools.create', compact('plan_types', 'admins'));
    }

    public function store(Request $request)
    {
        if($files = $request->file('logo')){
            $logo = $files->getClientOriginalName();
            $logo_name = now()->timestamp.'_'.$logo;
            $files->move('images', $logo_name);  
        }
        else{
            $logo_name = "";
        }

        School::create([
            'name' => $request->name,
            'abbreviation' => $request->abbreviation,
            'email' => $request->email,
            'phone' => $request->phone,
            'logo' => $logo_name,
            'plan_type_id' => $request->plan_type_id,
            'user_id' => $request->user_id,
            'created_by' => auth()->user()->id,
            'status' => $request->status,
        ]);
        
        return redirect()->route('schools')->with('message', 'School added successfully');
    }

    public function edit($id)
    {
        $data = School::where('id', $id)->first();
        $plan_types = PlanType::where('status', 1)->get();
        $admins = User::where('usertype', 'school_admin')->get();
        
        return view('admin.schools.edit', compact('data', 'plan_types', 'admins'));
    }

    public function update(Request $request)
    {
        if($files = $request->file('logo')){
            $logo = $files->getClientOriginalName();
            $logo_name = now()->timestamp.'_'.$logo;
            $files->move('images', $logo_name);

            $previous_logo = User::where('id', $request->id)->value('logo');
            $path = 'images/'.$previous_logo;
            if(File::exists(public_path($path))){
                File::delete(public_path($path));
            }

            School::where('id', $request->id)->update([
                'logo' => $logo_name,
            ]);
        }
        School::where('id', $request->id)->update([
            'name' => $request->name,
            'abbreviation' => $request->abbreviation,
            'email' => $request->email,
            'phone' => $request->phone,
            'plan_type_id' => $request->plan_type_id,
            'user_id' => $request->user_id,
            'created_by' => auth()->user()->id,
            'status' => $request->status,
        ]);

        if($request->password != ''){
            School::where('id', $request->id)->update([
                'password' => Hash::make($request->password)
            ]);
        }
        return redirect()->route('schools')->with('message', 'School updated successfully');
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('schools')->with('message', 'School deleted successfully');
    }
}