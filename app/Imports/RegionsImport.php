<?php

namespace App\Imports;
ini_set('max_execution_time', 1200);

use App\Region;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Arr as SupportArr;

class RegionsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $rows)
    {
        $id = SupportArr::get($rows, 'cve_reg');
        $name = SupportArr::get($rows, 'nom_reg');
        $region = SupportArr::get($rows, 'region');
        $Region = Region::where('id', $id)->exists();
                if (!$Region) {
                    $Regions = new Region();
                    $Regions->id = $id;
                    $Regions->nameRegion = $name;
                    $Regions->region = $region;
                    $Regions->save();
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
