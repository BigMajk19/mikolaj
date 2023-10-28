<?php

namespace App\Imports;

use App\Models\AreaDistrict;
use Maatwebsite\Excel\Concerns\ToModel;

class DistrictImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AreaDistrict([
            'district_name' => $row[0],
            'area_city_id' => $row[1],
        ]);
    }
}
