<?php

namespace App\Imports;

use App\Models\AreaVoivodeship;
use Maatwebsite\Excel\Concerns\ToModel;

class VoivodeshipImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AreaVoivodeship([
            'voivodeship_name' => $row[0],
        ]);
    }
}
