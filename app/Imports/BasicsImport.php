<?php

namespace App\Imports;

ini_set('max_execution_time', 1200);

use App\Basic;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithValidation;

class BasicsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, ShouldQueue, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
            return new Basic([
            'consignment' => $row['REMESA'] ?? $row['remesa'] ?? null,
            'locality_id' => $row['CLAVEOFI'] ?? $row['claveofi'] ?? null,
            'titular_id' => $row['FAM_ID'] ?? $row['fam_id'] ?? null,
            'status' => $row['CR'] ?? $row['cr'] ?? null,
        ]);
        //print_r($row['FAM_ID'] ?? $row['fam_id'] );
        //print_r("<br");
    }

    public function rules(): array
    {
        return [
            'remesa' => function ($attribute, $value, $onFailure) {
                if ($value == '') {
                    $value = null;
                }
            },
            'claveofi' => function ($attribute, $value, $onFailure) {
                if ($value == '') {
                    $value = null;
                }
            },
            'fam_id' => function ($attribute, $value, $onFailure) {
                if ($value == '') {
                    $value = null;
                }
            },
            'cr' => function ($attribute, $value, $onFailure) {
                if ($value == '') {
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
