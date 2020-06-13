<?php

namespace App\Imports;
ini_set('max_execution_time', 9600);

use App\Titular;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithValidation;


class TitularsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, ShouldQueue, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        //$flight = App\Flight::firstOrCreate(['name' => 'Flight 10']);
        $Titular = Titular::where('id', $row['fam_id'])->exists();
        if (!$Titular) {
            return new Titular([
                'id' => $row['FAM_ID'] ?? $row['fam_id'],
                'idScholar' => $row['INT_ID'] ?? $row['int_id'] ?? null,
                'nameTitular' => $row['NOM_TIT'] ?? $row['nom_tit'] ?? null,
                'firstSurname' => $row['AP1'] ?? $row['ap1'] ?? null,
                'secondSurname' => $row['AP2'] ?? $row['ap2'] ?? null,
                'gender' => $row['GENERO'] ?? $row['genero'] ?? null,
                'birthDate' => $row['FEC_NAC'] ?? $row['fec_nac'] ?? $row['FECHA_NACIMIENTO'] ?? $row['fecha_nacimiento'] ?? null,
                'curp' =>  $row['CURP'] ?? $row['curp'] ?? null,
            ]);
            Titular::connection()->disableQueryLog(); 
        }
        //print_r($row['int_id'] ?? $row['INT_ID']);
        //print_r("<br>");
    }

    public function rules(): array
    {
        return [
            'int_id' => function($attribute, $value, $onFailure) {
                if ($value == '') {
                     $value = null;
                }
            },
             'nom_tit' => function($attribute, $value, $onFailure) {
                  if ($value == '') {
                       $value = null;
                  }
              },
              'ap1' => function($attribute, $value, $onFailure) {
                if ($value == '') {
                     $value = null;
                }
            },
            'ap2' => function($attribute, $value, $onFailure) {
                if ($value == '') {
                     $value = null;
                }
            },
            'genero' => function($attribute, $value, $onFailure) {
                if ($value == '') {
                     $value = null;
                }
            },
            'fec_nac' => function($attribute, $value, $onFailure) {
                if ($value == [0-9] || $value == "") {
                     $value = null;
                }
            },
            'curp' => function($attribute, $value, $onFailure) {
                if ($value == "") {
                     $value = null;
                }
            },
                
        ];
    }

    public function batchSize(): int
    {
        return 900;
    }

    public function chunkSize(): int
    {
        return 900;
    }
}
