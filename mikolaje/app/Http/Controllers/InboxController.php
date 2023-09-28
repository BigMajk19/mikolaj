<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class InboxController extends Controller
{
    public function ShowAdminInbox()
    {
        return view('admin.emailbox.inbox');
    }
}
