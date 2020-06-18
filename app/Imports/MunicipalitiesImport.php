<?php

namespace App\Imports;

ini_set('max_execution_time', 100);

use App\Municipality;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;

class MunicipalitiesImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, ShouldQueue
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
        return 200;
    }

    public function chunkSize(): int
    {
        return 200;
    }
}
