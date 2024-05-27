<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::all();
        return view('templates.index', compact('templates'));
    }

    public function create()
    {
        return view('templates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'columns' => 'required|array',
            'columns.*' => 'required|string|max:255',
        ]);

        // Mass assignment
        Template::create([
            'name' => $request->name,
            'columns' => json_encode($request->columns),
        ]);

        return redirect()->route('templates.index')->with('success', 'Template created successfully.');
    }

    public function edit(Template $template)
    {
        return view('templates.edit', compact('template'));
    }

    public function update(Request $request, Template $template)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'columns' => 'required|array',
            'columns.*' => 'required|string|max:255',
        ]);

        // Mass assignment
        $template->update([
            'name' => $request->name,
            'columns' => json_encode($request->columns),
        ]);

        return redirect()->route('templates.index')->with('success', 'Template updated successfully.');
    }

    public function destroy(Template $template)
    {
        $template->delete();
        return redirect()->route('templates.index')->with('success', 'Template deleted successfully.');
    }
}
