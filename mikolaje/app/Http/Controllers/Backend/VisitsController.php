<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\VisitsName;
use App\Models\VisitsType;
use Illuminate\Http\Request;
use App\Models\VisitsSubmissions;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class VisitsController extends Controller
{
    public function ShowAllVisits()
    {
        $show = VisitsSubmissions::latest()->get();
        return view('admin.visits.show_all_visits',compact('show'));
    }

    public function AddVisit()
    {
        $types = VisitsType::latest()->get();
        return view('backend.visits.add_visit', compact('types'));
    }

    public function StoreVisit(Request $request)
    {

        VisitsSubmissions::insert([

            'type_name' => $request->type_name,
            'visit_name' => $request->visit_name,
            'length_visit' => $request->length_visit,
            'visit_qty' => $request->visit_qty,
            'facility_name' => $request->facility_name,
            'client_name' => $request->client_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'visit_date' => $request->visit_date,
            'preffered_time' => $request->preffered_time,
            'interval_hours' => $request->interval_hours,
            'guaranted' => $request->guaranted,
            'price' =>  $request->price,
            'additional_information' => $request->additional_information,
            'street_address' => $request->street_address,
            'street_number' => $request->street_number,
            'flat_number' => $request->flat_number,
            'district' => $request->district,
            'city' => $request->city,
            'zipcode' => $request->zipcode,
            'voivodeship' => $request->voivodeship,
            'counties' => $request->counties,
            'drive_fee' => $request->drive_fee,
            'invoice_company_name' => $request->invoice_company_name,
            'invoice_NIP' => $request-> invoice_NIP,
            'invoice_company_adress' => $request->invoice_company_adress,
            'accepted_statue' => $request->accepted_statue,
            'accepted_marketing' => $request->accepted_marketing,
            'remind_visit' => $request->remind_visit,
        ]);
        $notification = array(
            'message' => 'Pomyślnie dodano nową Wizytę.',
            'alert-type' => 'success',
        );
        return redirect()->route('show.all.visits')->with($notification);
    }
    public function EditVisit($id)
    {
        $types = VisitsSubmissions::findOrFail($id);
        return view('backend.visits.edit_visit', compact('types'));

    }

    public function UpdateVisit(Request $request)
    {
        $vid = $request->id;

        VisitsSubmissions::findOrFail($vid)->update([

            'visit_name' => $request->visit_name,
            'length_visit' => $request->length_visit,
            'visit_qty' => $request->visit_qty,
            'facility_name' => $request->facility_name,
            'client_name' => $request->client_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'visit_date' => $request->visit_date,
            'preffered_time' => $request->preffered_time,
            'interval_hours' => $request->interval_hours,
            'guaranted' => $request->guaranted,
            'price' =>  $request->price,
            'additional_information' => $request->additional_information,
            'street_address' => $request->street_address,
            'street_number' => $request->street_number,
            'flat_number' => $request->flat_number,
            'district' => $request->district,
            'city' => $request->city,
            'zipcode' => $request->zipcode,
            'voivodeship' => $request->voivodeship,
            'counties' => $request->counties,
            'drive_fee' => $request->drive_fee,
            'invoice_company_name' => $request->invoice_company_name,
            'invoice_NIP' => $request-> invoice_NIP,
            'invoice_company_adress' => $request->invoice_company_adress,
            'accepted_statue' => $request->accepted_statue,
            'accepted_marketing' => $request->accepted_marketing,
            'remind_visit' => $request->remind_visit,
        ]);
        $notification = array(
            'message' => 'Wizyta została pomyślnie zaktualizowana.',
            'alert-type' => 'success',
        );
        return redirect()->route('show.all.visits')->with($notification);
    }

    public function DeleteVisit ($id)
    {
        VisitsSubmissions::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Wizyta została pomyślnie usunięta.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    // For Showing Visits

    public function ShowVisitsNew()
    {
        $show = VisitsSubmissions::where('status', 'new')->get();


        return view('admin.visits.show_all_new_visits',compact('show'));
    }

    public function ShowVisitsNotPaid()
    {
        $show = VisitsSubmissions::where('status', 'not_paid')->get();


        return view('admin.visits.show_all_not_paid_visits',compact('show'));
    }

    public function ShowVisitsNotSignTo()
    {
        $show = VisitsSubmissions::whereNull('partner')->where('status','paid')->get();


        return view('admin.visits.show_all_not_sign_to_visits',compact('show'));
    }

    public function ShowVisitsReserveList()
    {
        $show = VisitsSubmissions::where('status', 'reserve_list')->get();


        return view('admin.visits.show_all_reserve_list_visits',compact('show'));
    }

    public function ShowVisitsCanceled()
    {
        $show = VisitsSubmissions::where('status', 'canceled')->get();


        return view('admin.visits.show_all_canceled_visits',compact('show'));
    }

    public function ShowVisitsPaidAndSignTo()
    {

        $show = VisitsSubmissions::whereNotNull('partner')->where('status','paid')->get();


        return view('admin.visits.paid_and_sign_to',compact('show'));
    }

    public function ShowVisitsRealized()
    {
        $show = VisitsSubmissions::where('status', 'realized')->get();


        return view('admin.visits.show_realized_visits',compact('show'));
    }




    // For Service New Visits
    public function ConfirmNewVisit($id)
    {
        VisitsSubmissions::findOrFail($id)->update([

            'status' => 'not_paid',
        ]);

        $notification = array(
            'message' => 'Wizyta została przyjęta do realizacji',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }

    public function CancelNewVisit($id)
    {
        VisitsSubmissions::findOrFail($id)->update([

            'status' => 'canceled',
        ]);

        $notification = array(
            'message' => 'Wizyta została anulowana',
            'alert-type' => 'warning',
        );
        return redirect()->back()->with($notification);

    }

    public function PaidNewVisit($id)
    {
        VisitsSubmissions::findOrFail($id)->update([

            'status' => 'paid',
        ]);

        $notification = array(
            'message' => 'Wizyta została Opłacona',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }

    public function SignToNewVisit($id)
    {
        $types = VisitsSubmissions::findOrFail($id);
        return view('admin.visits.sign_to_visit', compact('types'));

    }

    public function SignPartnerToNewVisit(Request $request)
    {
        $vid = $request->id;

        VisitsSubmissions::findOrFail($vid)->update([

            'partner' => $request->partner,
        ]);
        $notification = array(
            'message' => 'Partner został pomyślnie przypisany do wizyty',
            'alert-type' => 'success',
        );
        return redirect()->route('show.visits.not_sign_to')->with($notification);
    }

    public function ChangeStatusNewVisit($id)
    {
        VisitsSubmissions::findOrFail($id)->update([

            'status' => 'new',
        ]);

        $notification = array(
            'message' => 'Wizyta została Opłacona',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }


    // For switching options in Visits Form
    public function GetTypeNameVisit($typeName)
    {
        // Pobierz opcje nazw wizyt na podstawie wybranego rodzaju wizyty
        $visitsName = VisitsName::where('type_name', $typeName)->pluck('type_name', 'id');

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
