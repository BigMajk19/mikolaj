<?php

namespace App\Exports;

use App\Models\AreaCity;
use Maatwebsite\Excel\Concerns\FromCollection;

class CityExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return AreaCity::all();
        return AreaCity::select('city_name', 'area_voivodeship_id', 'status')->get();
    }
}
