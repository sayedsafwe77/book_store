<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\CategoryExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $modelExport = "App\Exports\\". $request->model . 'Export';
        if(!class_exists($modelExport)) return redirect()->back()->with('error', 'model export not exist!');
        return Excel::download(new $modelExport, 'categories.xlsx');
    }
}
