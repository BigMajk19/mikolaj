<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Partners;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    public function ShowActivePartners ()
    {

        $active_partners = Partners::where('partner_status', 'active')->get();
        return view('admin.partners.show_active_partners',compact('active_partners'));
    }

    public function ShowNotActivePartners ()
    {

        $notactive_partners = Partners::where('partner_status', 'notactive')->get();
        return view('admin.partners.show_notactive_partners',compact('notactive_partners'));
    }

    public function AddNewPartner()
    {
        return view('backend.partners.add_partner');
    }

    public function StoreNewPartner(Request $request)
    {

        // $imagePath = $request->file('cv')->store('public/backend/upload/images/candidates');
        // $file=$request->file('agreement');
        // $filename= date('YmdHis').$file->getClientOriginalName();
        // $file->move(public_path('upload/images/partners'), $filename);

        Partners::insert([

            'partner_name' => $request->partner_name,
            'partner_firstname' => $request->partner_firstname,
            'partner_lastname' => $request->partner_lastname,
            'partner_phone' => $request->partner_phone,
            'partner_email' => $request->partner_email,
            'partner_NIP' => $request->partner_NIP,
            'partner_adress_street' => $request->partner_adress_street,
            'partner_adress_number' => $request->partner_adress_number,
            'partner_adress_flat' => $request->partner_adress_flat,
            'partner_zipcode' => $request->partner_zipcode,
            'partner_city' => $request->partner_city,
            'partner_voivodeship' => $request->partner_voivodeship,
            'partner_country' => $request->partner_country,
            // 'agreement' => $filename,
        ]);


        $notification = array(
            'message' => 'Pomyślnie dodano nowego Partnera.',
            'alert-type' => 'success',
        );
        return redirect()->route('show.partners.active')->with($notification);
    }

    public function EditPartner($id)
    {
        $types = Partners::findOrFail($id);
        return view('backend.partners.edit_partner', compact('types'));

    }

    public function UpdatePartner(Request $request)
    {
        $pid = $request->id;

        Partners::findOrFail($pid)->update([

            'partner_name' => $request->partner_name,
            'partner_firstname' => $request->partner_firstname,
            'partner_lastname' => $request->partner_lastname,
            'partner_phone' => $request->partner_phone,
            'partner_email' => $request->partner_email,
            'partner_NIP' => $request->partner_NIP,
            'partner_adress_street' => $request->partner_adress_street,
            'partner_adress_number' => $request->partner_adress_number,
            'partner_adress_flat' => $request->partner_adress_flat,
            'partner_zipcode' => $request->partner_zipcode,
            'partner_city' => $request->partner_city,
            'partner_voivodeship' => $request->partner_voivodeship,
            'partner_country' => $request->partner_country,
        ]);
        $notification = array(
            'message' => 'Partner został pomyślnie zaktualizowany.',
            'alert-type' => 'success',
        );
        return redirect()->route('show.partners.active')->with($notification);
    }

    public function DeletePartner ($id)
    {
        Partners::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Partner został pomyślnie usunięty.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

// For Service New Partners
    public function ConfirmNewPartner($id)
    {
        Partners::findOrFail($id)->update([

            'partner_status' => 'active',
        ]);

        $notification = array(
            'message' => 'Partner został aktywowany',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }
}
