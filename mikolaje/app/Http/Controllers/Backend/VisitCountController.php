<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\VisitsSubmissions;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class VisitCountController extends Controller
{
    public function CountAllVisits()
    {
        $show = VisitsSubmissions::latest()->get();
        $countAll = count($show);
        // dd ($countAll);
        return view('layouts.inc.admin.sidebar', compact('countAll'));
    }
}
