<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\VisitsName;
use App\Models\VisitsType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VisitsTypeController extends Controller
{
    public function AllType()
    {
        $types = VisitsType::latest()->get();
        $names = VisitsName::latest()->get();
        return view('backend.type.all_type', compact('types', 'names'));
    }

    public function AddType()
    {
        return view('backend.type.add_type');
    }

    public function StoreType(Request $request)
    {

        VisitsType::insert([

            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);
        $notification = array(
            'message' => 'Pomyślnie dodano nową kategorię.',
            'alert-type' => 'success',
        );
        return redirect()->route('all.typevisits')->with($notification);
    }

    public function EditType($id)
    {
        $types = VisitsType::findOrFail($id);
        return view('backend.type.edit_type', compact('types'));

    }

    public function UpdateType(Request $request)
    {
        $pid = $request->id;

        VisitsType::findOrFail($pid)->update([

            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);
        $notification = array(
            'message' => 'Kategoria została pomyślnie zaktualizowana.',
            'alert-type' => 'success',
        );
        return redirect()->route('all.typevisits')->with($notification);
    }

    public function DeleteType ($id)
    {
        VisitsType::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Kategoria została pomyślnie usunięta.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    // Controllers For NAME Visits
    public function AddNameVisit()
    {
        $types = VisitsType::latest()->get();
        return view('backend.type.add_name_visit',compact('types'));
    }

    public function StoreNameVisit(Request $request)
    {

        VisitsName::insert([

            'type_name' => $request->type_name,
            'visit_name' => $request->visit_name,
            'visit_length' => $request->visit_length,
            'visit_price_net' => $request->visit_price_net,
            'visit_price_gross' => $request->visit_price_gross,
            'visit_image' => $request->visit_image,

        ]);
        $notification = array(
            'message' => 'Pomyślnie dodano nowy rodzaj wizyty.',
            'alert-type' => 'success',
        );
        return redirect()->route('all.typevisits')->with($notification);
    }

    public function EditNameVisit($id)
    {
        $types = VisitsType::latest()->get();
        $names = VisitsName::findOrFail($id);
        return view('backend.type.edit_name_visit', compact('types','names'));

    }

    public function UpdateNameVisit(Request $request)
    {
        $nid = $request->id;

        VisitsName::findOrFail($nid)->update([

            'type_name' => $request->type_name,
            'visit_name' => $request->visit_name,
            'visit_length' => $request->visit_length,
            'visit_price_net' => $request->visit_price_net,
            'visit_price_gross' => $request->visit_price_gross,
            // 'visit_image' => $request->visit_image,
        ]);
        $notification = array(
            'message' => 'Rodzaj wizyty został pomyślnie zaktualizowany.',
            'alert-type' => 'success',
        );
        return redirect()->route('all.typevisits')->with($notification);
    }

    public function DeleteNameVisit ($id)
    {
        VisitsName::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Rodzaj wizyty został pomyślnie usunięty.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
