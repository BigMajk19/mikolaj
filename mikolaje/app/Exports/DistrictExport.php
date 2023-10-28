<?php

namespace App\Exports;

use App\Models\AreaDistrict;
use Maatwebsite\Excel\Concerns\FromCollection;

class DistrictExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return AreaDistrict::all();
        return AreaDistrict::select('district_name', 'area_city_id')->get();
    }
}
