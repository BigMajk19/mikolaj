<?php

namespace App\Imports;

use App\Models\AreaCity;
use Maatwebsite\Excel\Concerns\ToModel;

class CityImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AreaCity([
            'city_name' => $row[0],
            'area_voivodeship_id' => $row[1],
            'status' => $row[2],
        ]);
    }
}
