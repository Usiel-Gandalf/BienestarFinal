<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RegionsImport;
use App\Imports\MunicipalitiesImport;
use App\Imports\LocalitiesImport;
use App\Imports\SchoolsImport;
use App\Imports\ScholarsImport;

class ImportController extends Controller
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

public function importMunicipality(Request $request)
{
    $data = request()->except(['_token','_method']);
    $request->validate([
        'municipality' => 'required|mimes:xlsx',
    ]);

    $file = $request->file('municipality');
    Excel::import(new MunicipalitiesImport, $file); 
    return back()->with('municipalityAlert', 'Importacion de municipios exitoso');   
}

public function importLocality(Request $request)
{
    $data = request()->except(['_token','_method']);
    $request->validate([
        'locality' => 'required|mimes:xlsx',
    ]);

    $file = $request->file('locality');
    Excel::import(new LocalitiesImport, $file); 
    return back()->with('localityAlert', 'Importacion de localidades exitosa');
}

public function importSchool(Request $request)
{
    $data = request()->except(['_token','_method']);
    $request->validate([
        'school' => 'required|mimes:xlsx',
    ]);

    $file = $request->file('school');
    Excel::import(new SchoolsImport, $file); 
    return back()->with('schoolAlert', 'Importacion de escuelas exitosa');
}

public function importScholar(Request $request)
{
    $data = request()->except(['_token','_method']);
    $request->validate([
        'scholar' => 'required|mimes:xlsx',
    ]);

    $file = $request->file('scholar');
    Excel::import(new ScholarsImport, $file); 
    return back()->with('scholarAlert', 'Importacion de alumnos exitoso');
}

}
