<?php

namespace App\Imports;
ini_set('max_execution_time', 1200);
use App\Locality;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class LocalitiesImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $Locality = Locality::where('id', $row['claveofi'])->exists();
            if (!$Locality) {
                return new Locality([
                    'id' => $row['CLAVEOFI'] ?? $row['claveofi'],
                    'keyLocality' => $row['CVE_LOC'] ?? $row['cve_loc'],
                    'nameLocality' => $row['NOM_LOC'] ?? $row['nom_loc'],
                    'municipality_id' =>  $row['CVE_MUN'] ?? $row['cve_mun'],
                ]);
            }
    }

    public function batchSize(): int
    {
        return 200;
    }

    public function chunkSize(): int
    {
        return 400;
    }
}
