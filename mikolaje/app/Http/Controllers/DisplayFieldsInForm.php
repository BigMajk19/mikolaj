<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VisitsName;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AreaCity;
use App\Models\AreaDistrict;
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

//For Get data about city and voivodeship
    public function GetVoivodeshipName($voivodeshipNameId)
    {
      // Pobierz opcje nazw wizyt na podstawie wybranego rodzaju wizyty
      $voivodeshipName = AreaCity::where('area_voivodeship_id', $voivodeshipNameId)->where('status', 'active')->pluck('city_name', 'id');

      return response()->json($voivodeshipName);
    }

    public function GetVoivodeshipNameForVisits($voivodeshipNameId)
    {
      // Pobierz opcje nazw wizyt na podstawie wybranego rodzaju wizyty
      $voivodeshipName = AreaCity::where('area_voivodeship_id', $voivodeshipNameId)->where('status', 'active')->pluck('city_name', 'id');

      return response()->json($voivodeshipName);
    }

    public function GetCityName($cityNameId)
    {
      // Pobierz opcje nazw wizyt na podstawie wybranego rodzaju wizyty
      $cityName = AreaDistrict::where('area_city_id', $cityNameId)->pluck('district_name', 'id');

      if (!$cityName) {
        return response()->json(['error' => 'Nie znaleziono dzielnicy']);
      }
      return response()->json($cityName);
    }

    public function GetDistrictData($districtNameId)
    {
      // Pobierz długość trwania i cenę na podstawie wybranej nazwy wizyty
      $districtName = AreaDistrict::find($districtNameId);

      if (!$districtName) {
        return response()->json(['error' => 'Nie znaleziono miasta']);
      }

      $data = [
        'districtName' => $districtName->district_name,
        // 'priceNet' => $cityName->visit_price_net,
        // 'priceGross' => $cityName->visit_price_gross,
      ];

      return response()->json($data);
    }

}
