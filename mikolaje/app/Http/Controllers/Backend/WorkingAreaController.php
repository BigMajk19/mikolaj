<?php

namespace App\Http\Controllers\Backend;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AreaCity;
use App\Models\AreaDistrict;
use App\Models\AreaVoivodeship;

class WorkingAreaController extends Controller
{
    public function ShowWorkingArea()
    {
        $varea = AreaVoivodeship::latest()->get();
        $carea = AreaCity::latest()->get();
        $darea = AreaDistrict::latest()->get();
        return view('backend.workingArea.show_all_area', compact('varea', 'carea', 'darea'));
    }
    //For Voivodeship_Area
    public function AddVoivodeship()
    {
        return view('backend.workingArea.add_voivodeship');
    }

    public function StoreAreaVoivodeship(Request $request)
    {

        AreaVoivodeship::insert([

            'voivodeship_name' => $request->voivodeship_name,

        ]);
        $notification = array(
            'message' => 'Pomyślnie dodano nowe województwo.',
            'alert-type' => 'success',
        );
        return redirect()->route('show.working.area')->with($notification);
    }

    public function EditAreaVoivodeship($id)
    {
        $varea = AreaVoivodeship::findOrFail($id);
        return view('backend.workingArea.edit_voivodeship', compact('varea'));

    }

    public function UpdateAreaVoivodeship(Request $request)
    {
        $vid = $request->id;

        AreaVoivodeship::findOrFail($vid)->update([

            'voivodeship_name' => $request->voivodeship_name,
        ]);
        $notification = array(
            'message' => 'Województwo zostało pomyślnie zaktualizowane.',
            'alert-type' => 'success',
        );
        return redirect()->route('show.working.area')->with($notification);
    }

    public function DeleteAreaVoivodeship ($id)
    {
        AreaVoivodeship::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Województwo zostało pomyślnie usunięte.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


// For City_Area
    public function AddCity()
    {
        $varea = AreaVoivodeship::latest()->get();
        return view('backend.workingArea.add_city', compact('varea'));
    }

    public function StoreAreaCity(Request $request)
    {

        AreaCity::insert([

            'city_name' => $request->city_name,
            'area_voivodeship_id' => $request->area_voivodeship_id,
            'status' => $request->status,

        ]);
        $notification = array(
            'message' => 'Pomyślnie dodano nowe miasto.',
            'alert-type' => 'success',
        );
        return redirect()->route('show.working.area')->with($notification);
    }

    public function EditAreaCity($id)
    {
        $varea = AreaVoivodeship::latest()->get();
        $carea = AreaCity::findOrFail($id);
        return view('backend.workingArea.edit_city', compact('carea','varea'));

    }

    public function UpdateAreaCity(Request $request)
    {
        $cid = $request->id;

        AreaCity::findOrFail($cid)->update([

            'city_name' => $request->city_name,
            'area_voivodeship_id' => $request->area_voivodeship_id,
            'status' => $request->status,

        ]);
        $notification = array(
            'message' => 'Miasto zostało pomyślnie zaktualizowane.',
            'alert-type' => 'success',
        );
        return redirect()->route('show.working.area')->with($notification);
    }

    public function DeleteAreaCity ($id)
    {
        AreaCity::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Miasto zostało pomyślnie usunięte.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

// For Area City District
    public function AddDistrict()
    {
        $carea = AreaCity::latest()->get();
        return view('backend.workingArea.add_district', compact('carea'));
    }

    public function StoreAreaDistrict(Request $request)
    {

        AreaDistrict::insert([

          'district_name' => $request->district_name,
          'area_city_id' => $request->area_city_id,

        ]);
        $notification = array(
            'message' => 'Pomyślnie dodano nową dzielnicę.',
            'alert-type' => 'success',
        );
        return redirect()->route('show.working.area')->with($notification);
    }

    public function EditAreaDistrict($id)
    {
        $carea = AreaCity::latest()->get();
        $darea = AreaDistrict::findOrFail($id);
        return view('backend.workingArea.edit_district', compact('carea','darea'));

    }

    public function UpdateAreaDistrict(Request $request)
    {
        $did = $request->id;

        AreaDistrict::findOrFail($did)->update([

            'district_name' => $request->district_name,
            'area_city_id' => $request->area_city_id,

        ]);
        $notification = array(
            'message' => 'Miasto zostało pomyślnie zaktualizowane.',
            'alert-type' => 'success',
        );
        return redirect()->route('show.working.area')->with($notification);
    }

    public function DeleteAreaDistrict ($id)
    {
        AreaDistrict::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Dzielnica została pomyślnie usunięta.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
