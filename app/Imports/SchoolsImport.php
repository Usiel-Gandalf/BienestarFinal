<?php

namespace App\Imports;
ini_set('max_execution_time', 1200);

use App\School;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Arr as SupportArr;

class SchoolsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function model(array $rows)
    {    
            $id = SupportArr::get($rows, 'cve_esc');
            $name = SupportArr::get($rows, 'nom_esc');
            $foreign = SupportArr::get($rows, 'claveofi');
            $School = School::where('idSchool', $id)->exists();
            if (!$School) {
               $Schools = new School();
                $Schools->idSchool = $id;
                $Schools->nameSchool = $name;
                $Schools->locality_id = $foreign ?? null;
                $Schools->save();
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
