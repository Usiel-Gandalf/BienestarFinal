<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RegionsImport;

class ImportDeliveryController extends Controller
{

public function importRegion(Request $request)
{
    $data = request()->except(['_token','_method']);
    $request->validate([
        'region' => 'required|mimes:xlsx',
    ]);

    $file = $request->file('region');
    Excel::import(new RegionsImport, $file); 
    return back()->with('regionAlert', 'Importacion de regiones exitosa'); 
}
}
