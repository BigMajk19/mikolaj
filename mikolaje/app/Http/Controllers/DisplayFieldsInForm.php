<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VisitsName;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DisplayFieldsInForm extends Controller
{
    // For switching options in Visits Form
    public function GetTypeNameVisit($typeNameId)
    {
        // Pobierz opcje nazw wizyt na podstawie wybranego rodzaju wizyty
        $visitsName = VisitsName::where('visits_type_id', $typeNameId)->pluck('visit_name', 'id');

        return response()->json($visitsName);
    }

    public function GetDataVisit($visitNameId)
    {
        // Pobierz długość trwania i cenę na podstawie wybranej nazwy wizyty
        $visitName = VisitsName::find($visitNameId);

        if (!$visitName) {
            return response()->json(['error' => 'Nie znaleziono wizyty']);
        }

        $data = [
            'lengthVisit' => $visitName->visit_length,
            'priceNet' => $visitName->visit_price_net,
            'priceGross' => $visitName->visit_price_gross,
        ];

        return response()->json($data);
    }


}
