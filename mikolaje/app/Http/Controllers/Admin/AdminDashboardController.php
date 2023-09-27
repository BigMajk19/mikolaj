<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function AdminProfile ()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.profile_view', compact('profileData'));
    }

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone_number = $request->phone_number;
        $data->company_name = $request->company_name;
        $data->NIP = $request->NIP;
        $data->street_address = $request->street_address;
        $data->street_number = $request->street_number;
        $data->flat_number = $request->flat_number;
        $data->zipcode = $request->zipcode;
        $data->city = $request->city;
        $data->voivodeship = $request->voivodeship;

        if ($request->file('photo')) {
            $file=$request->file('photo');
            @unlink(public_path('upload/images/'.$data->photo));
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('upload/images/'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Successfully Updated!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword()
    {
        return view('admin.admin_password');
    }

    public function AdminUpdatePassword(Request $request)
    {
        //Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Match Old Password
        if(!Hash::check($request->old_password, auth::user()->password)){
            $notification = array(
                'message' => 'Stare hasło nie pasuje. Spróbuj raz jeszcze!',
                'alert-type' => 'error',
            );

            return back()->with($notification);
        }

        // Update New Password
        User::whereId(auth()->user()->id)->update ([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'Zmiana hasła przebiegła pomyślnie.',
            'alert-type' => 'success',
        );

        return back()->with($notification);

    }
}
