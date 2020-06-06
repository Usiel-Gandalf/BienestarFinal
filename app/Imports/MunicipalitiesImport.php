<?php

namespace App\Imports;
ini_set('max_execution_time', 1200);

use App\Municipality;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class MunicipalitiesImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
   
    public function model(array $row)
    {
        $Municipality = Municipality::where('id', $row['cve_mun'])->exists();
                if (!$Municipality) {
                    return new Municipality([
                        'id' => $row['cve_mun'] ?? $row['CVE_MUN'] ,
                        'nameMunicipality' => $row['nom_mun'] ?? $row['NOM_MUN'] ,
                        'region_id' =>  $row['cve_region'] ?? $row['CVE_REGION'],
                    ]);
                }
    }
    
    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 200;
    }
}
