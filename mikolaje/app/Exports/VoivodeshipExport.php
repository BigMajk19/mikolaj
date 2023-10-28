<?php

namespace App\Exports;

use App\Models\AreaVoivodeship;
use Maatwebsite\Excel\Concerns\FromCollection;

class VoivodeshipExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return AreaVoivodeship::all();
        return AreaVoivodeship::select('voivodeship_name')->get();
    }
}
