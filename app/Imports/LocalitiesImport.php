<?php

namespace App\Imports;
ini_set('max_execution_time', 1200);
use App\Locality;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Arr as SupportArr;

class LocalitiesImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $rows)
    {
        $id = SupportArr::get($rows, 'claveofi');
        $id_loc = SupportArr::get($rows, 'cve_loc');
        $name = SupportArr::get($rows, 'nom_loc');
        $foreign = SupportArr::get($rows, 'cve_mun');
        $Locality = Locality::where('id', $id)->exists();
            if (!$Locality) {
                $Localities = new Locality();
                $Localities->id = $id;
                $Localities->keyLocality = $id_loc;
                $Localities->nameLocality = $name;
                $Localities->municipality_id = $foreign ?? null;
                $Localities->save();
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
