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
    public function model(array $row)
    {
        $Region = Region::where('id', $row['cve_reg'])->exists();
        if (!$Region) {
            return new Region([
                'id' => $row['CVE_REG'] ?? $row['cve_reg'],
                'nameRegion' => $row['NOM_REG'] ?? $row['nom_reg'],
                'region' => $row['REGION'] ?? $row['region'],
            ]);
        }
    }

    public function batchSize(): int
    {
        return 5;
    }

    public function chunkSize(): int
    {
        return 10;
    }
}
