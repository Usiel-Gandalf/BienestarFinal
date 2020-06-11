<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ScholarsImport;
use App\Imports\TitularsImport;

class ImportScholarsController extends Controller
{
    public function importScholar(Request $request)
{
    $data = request()->except(['_token','_method']);
    $request->validate([
        'scholar' => 'required|mimes:xlsx, xls',
    ]);

    $file = $request->file('scholar');
    Excel::import(new ScholarsImport, $file); 
    return back()->with('scholarAlert', 'Importacion de alumnos exitoso');
}

public function importTitular(Request $request){
    $data = request()->except(['_token','_method']);
    $request->validate([
        'titular' => 'required|mimes:xlsx, xls',
    ]);
    
    $file = $request->file('titular');
    Excel::import(new TitularsImport, $file); 
    return back()->with('titularAlert', 'Importacion de titulares con exito');
}
}
