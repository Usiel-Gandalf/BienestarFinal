<?php

namespace App\Imports;
ini_set('max_execution_time', 1200);

use App\Scholar;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\SkipsErrors;

class ScholarsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    use SkipsErrors;

    public function model(array $row)
    {
       $Scholar = Scholar::where('id', $row['int_id'])->exists();
        if (!$Scholar) {
            return new Scholar([
                'id' => $row['INT_ID'] ?? $row['int_id'],
                'nameScholar' => $row['NOM_BEC'] ?? $row['nom_bec'],
                'firstSurname' => $row['AP1'] ?? $row['ap1'],
                'secondSurname' => $row['AP2'] ?? $row['ap2'] ?? null,
                'gender' => $row['GENERO'] ?? $row['genero'],
                'birthDate' =>  null,
                'curp' =>  $row['CURP'] ?? $row['curp'],
            ]);
        }    
    }
    
    public function batchSize(): int
    {
        return 10;
    }

    public function chunkSize(): int
    {
        return 10;
    }
}
