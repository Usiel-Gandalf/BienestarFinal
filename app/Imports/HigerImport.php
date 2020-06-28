<?php

namespace App\Imports;

ini_set('max_execution_time', 1200);

use App\Higer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;

class HigerImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, ShouldQueue
{

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        //$h = Higer::where('consignment', $row['CVE_LOC'] ?? $row['cve_loc'])->count();
        //if ($h == 0) {
        //    print 'no existe';
        //}else{
        //    print 'existe';
        //}

        /* return new Higer([
            'scholar_id' => $row['INT_ID'] ?? $row['int_id'],
            'school_id' => $row['CVE_ESC'] ?? $row['cve_esc'],
            'consignment' => $row['REMESA'] ?? $row['remesa'],
            'fol_form' => $row['FOL_FORM'] ?? $row['fol_form'],
            'bimester' => $this->bimester ?? null,
            'year' => $this->year ?? null,
            'status' => 0 ?? null,
        ]);*/
        print_r($row['FOL_FORM'] ?? $row['fol_form']);
        echo'<br>';

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
