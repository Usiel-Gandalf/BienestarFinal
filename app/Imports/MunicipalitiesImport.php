<?php

namespace App\Imports;
ini_set('max_execution_time', 1200);

use App\Municipality;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Arr as SupportArr;

class MunicipalitiesImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
   
    public function model(array $rows)
    {
        $id = SupportArr::get($rows, 'cve_mun');
        $name = SupportArr::get($rows, 'nom_mun');
        $foreign = SupportArr::get($rows, 'cve_region');
        $Municipality = Municipality::where('id', $id)->exists();
                if (!$Municipality) {
                    $Municipalities = new Municipality();
                    $Municipalities->id = $id;
                    $Municipalities->nameMunicipality = $name;
                    $Municipalities->region_id = $foreign ?? null;
                    $Municipalities->save();

                }
    }
    
    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
