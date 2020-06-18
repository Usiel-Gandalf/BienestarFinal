<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ScholarsImport;
use App\Imports\TitularsImport;
use App\Imports\BasicsImport;

class ImportScholarController extends Controller
{
    public function importScholar(Request $request)
    {
        $data = request()->except(['_token', '_method']);
        $request->validate([
            'universeInformation' => 'required|mimes:xlsx, xls',
            'level' => 'required',
        ]);
        $level = $request->level;

        if ($level == "null") {
            return back()->with('level', 'Seleccione un nivel educativo');
        } elseif ($level == 1) {
            $file = $request->file('universeInformation');
            Excel::queueImport(new TitularsImport, $file);
            return back()->with('titularAlert', 'Importacion de titulares con exito');
        } elseif ($level == 2 || $level == 3) {
            $file = $request->file('universeInformation');
            Excel::queueImport(new ScholarsImport($level), $file); 
            return back()->with('scholarAlert', 'Importacion de alumnos exitoso');
        }
    }

    public function importDelivery(Request $request)
    {
        $data = request()->except(['_token', '_method']);
        $request->validate([
            'universeDelivery' => 'required|mimes:xlsx, xls',
            'level' => 'required',
        ]);
        $level = $request->level;

        if ($level == "null") {
            return back()->with('level', 'Seleccione un nivel educativo');
        }elseif ($level == 1) {
            $file = $request->file('universeDelivery');
            Excel::import(new BasicsImport, $file);
            return back()->with('basicAlert', 'Importacion de remesas de educacion basica fue exitosa');
        }elseif ($level == 2) {
            return 'EMS';
        }elseif ($level == 3) {
            return 'JEF';
        }
    }
}
