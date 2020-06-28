<?php

namespace App\Imports;

use App\Medium;
use Maatwebsite\Excel\Concerns\ToModel;

class MediumImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Medium([
            //
        ]);
    }
}
