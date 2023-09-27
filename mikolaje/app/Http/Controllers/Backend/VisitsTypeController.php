<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\VisitsType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VisitsTypeController extends Controller
{
    public function AllType()
    {
        $types = VisitsType::latest()->get();
        return view('backend.type.all_type', compact('types'));
    }

    public function AddType()
    {
        return view('backend.type.add_type');
    }

    public function StoreType(Request $request)
    {

        //Validation
        $request->validate([
            'type_name' => 'required|unique:visits_types|max:200',
            'type_icon' => '',
        ]);

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
}
