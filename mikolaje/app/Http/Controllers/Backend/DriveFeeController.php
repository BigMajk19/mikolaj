<?php

namespace App\Http\Controllers\Backend;

use App\Models\DriveFee;
use App\Models\VisitsType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DriveFeeController extends Controller
{
    public function AddDriveFee()
    {
        $types = VisitsType::latest()->get();
        return view('backend.type.add_drive_fee',compact('types'));
    }

    public function StoreDriveFee(Request $request)
    {

        DriveFee::insert([

            'visits_type_id' => $request->visits_type_id,
            'distance' => $request->distance,
            'price_net' => $request->price_net,
            'price_gross' => $request->price_gross,

        ]);
        $notification = array(
            'message' => 'Pomyślnie dodano nową Opłatę dojazdową.',
            'alert-type' => 'success',
        );
        return redirect()->route('all.typevisits')->with($notification);
    }

    public function EditDriveFee($id)
    {
        $driveFee = DriveFee::findOrFail($id);
        return view('backend.type.edit_drive_fee', compact('driveFee'));

    }

    public function UpdateDriveFee(Request $request)
    {
        $did = $request->id;

        DriveFee::findOrFail($did)->update([

            'visits_type_id' => $request->visits_type_id,
            'distance' => $request->distance,
            'price_net' => $request->price_net,
            'price_gross' => $request->price_gross,

        ]);
        $notification = array(
            'message' => 'Opłata dojazdowa została pomyślnie zaktualizowana.',
            'alert-type' => 'success',
        );
        return redirect()->route('all.typevisits')->with($notification);
    }

    public function DeleteDriveFee ($id)
    {
        DriveFee::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Opłata dojazdowa została pomyślnie usunięta.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
