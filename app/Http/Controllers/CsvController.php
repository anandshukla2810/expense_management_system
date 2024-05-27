<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class CsvController extends Controller
{
    public function showForm()
    {
        $templates = Template::all();
        return view('csv.upload', compact('templates'));
    }

    public function processCsv(Request $request)
    {
        $request->validate([
            'template_id' => 'required|exists:templates,id',
            'csv_data' => 'required|string',
        ]);

        $template = Template::find($request->template_id);
        $columns = explode(",",json_decode($template->columns, true)[0]);

        $rows = explode("\n", $request->csv_data);
        $parsedData = [];
        
        foreach ($rows as $row) {
            $cells = explode("\t", $row);
            $parsedRow = [];
            
            foreach ($columns as $column) {
                $parsedRow[$column] = $cells[($column-1)] ?? null;
            }
            
            $parsedData[] = $parsedRow;
        }
        // dd($parsedData);
        return view('csv.result', compact('parsedData', 'columns'));
    }
}
