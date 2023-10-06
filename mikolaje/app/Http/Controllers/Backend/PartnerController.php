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
}
