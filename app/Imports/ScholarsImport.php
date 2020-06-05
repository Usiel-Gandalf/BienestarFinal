<?php

namespace App\Imports;
ini_set('max_execution_time', 1200);

use App\Scholar;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Arr as SupportArr;

class ScholarsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $rows)
    {
        $id = SupportArr::get($rows, 'int_id');
        print_r($id);
       /* $Scholar = Scholar::where('id', $id)->exists();
        if (!$Scholar) {
            $name = SupportArr::get($rows, 'nom_bec');
            $firstSurname = SupportArr::get($rows, 'ap1');
            $secondSurname = SupportArr::get($rows, 'ap2');
            $gender = SupportArr::get($rows, 'genero');
            $birthDate = SupportArr::get($rows, 'genero');
            $curp = SupportArr::get($rows, 'curp');

           $Scholars = new Scholar();
            $Scholars->id = $id;
            $Scholars->nameScholar = $name;
            $Scholars->firstSurname = $firstSurname;
            $Scholars->secondSurname = $secondSurname;
            $Scholars->gender = $gender;
            $Scholars->birthDate = $birthDate;
            $Scholars->curp = $curp;
            $Scholars->save();
        }    */
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
