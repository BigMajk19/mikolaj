<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Candidates;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CandidatesController extends Controller
{
    public function ShowAllCandidates ()
    {

        $show = Candidates::latest()->get();
        return view('admin.candidates.show_all_candidates',compact('show'));
    }

    public function AddCandidate()
    {
        return view('backend.candidates.add_candidate');
    }

    public function StoreNewCandidate(Request $request)
    {
        $request->validate([
            'candidate_firstname' => 'required|max:200',
            'candidate_lastname' => 'required|max:200',
            'candidate_phone' => 'required',
            'candidate_email' => 'required',
            'job_as' => 'required',
            'location_city' => 'required',
            'candidate_age' => 'required',
            'candidate_growth' => 'required',
            'candidate_weight' => 'required',
            'cloth_size' => '',
            'exp_with_children' => '',
            'exp_as_santa' => '',
            'drive_license' => '',
            'work_at_xmas' => '',
            'candidate_description' => '',
            'cv' => '',
            'privacy_policy' => '',

        ]);

        Candidates::insert([

            'candidate_firstname' => $request->candidate_firstname,
            'candidate_lastname' => $request->candidate_lastname,
            'candidate_phone' => $request->candidate_phone,
            'candidate_email' => $request->candidate_email,
            'job_as' => $request->job_as,
            'location_city' => $request->location_city,
            'candidate_age' => $request->candidate_age,
            'candidate_growth' => $request->candidate_growth,
            'candidate_weight' => $request->candidate_weight,
            'cloth_size' => $request->cloth_size,
            'exp_with_children' => $request->exp_with_children,
            'exp_as_santa' => $request->exp_as_santa,
            'drive_license' => $request->drive_license,
            'work_at_xmas' => $request->work_at_xmas,
            'candidate_description' => $request->candidate_description,
            'cv' => $request->cv,
            'privacy_policy' => $request->privacy_policy,
        ]);
        $notification = array(
            'message' => 'Pomyślnie dodano nowego kandydata.',
            'alert-type' => 'success',
        );
        return redirect()->route('show.all.candidates')->with($notification);
    }

    public function EditNewCandidate($id)
    {
        $types = Candidates::findOrFail($id);
        return view('backend.candidates.edit_candidate', compact('types'));

    }

    public function UpdateNewCandidate(Request $request)
    {
        $cid = $request->id;

        Candidates::findOrFail($cid)->update([

            'candidate_firstname' => $request->candidate_firstname,
            'candidate_lastname' => $request->candidate_lastname,
            'candidate_phone' => $request->candidate_phone,
            'candidate_email' => $request->candidate_email,
            'job_as' => $request->job_as,
            'location_city' => $request->location_city,
            'candidate_age' => $request->candidate_age,
            'candidate_growth' => $request->candidate_growth,
            'candidate_weight' => $request->candidate_weight,
            'cloth_size' => $request->cloth_size,
            'exp_with_children' => $request->exp_with_children,
            'exp_as_santa' => $request->exp_as_santa,
            'drive_license' => $request->drive_license,
            'work_at_xmas' => $request->work_at_xmas,
            'candidate_description' => $request->candidate_description,
            'cv' => $request->cv,
            'privacy_policy' => $request->privacy_policy,
        ]);
        $notification = array(
            'message' => 'Kandydat został pomyślnie zaktualizowany.',
            'alert-type' => 'success',
        );
        return redirect()->route('show.all.candidates')->with($notification);
    }

    public function DeleteCandidate ($id)
    {
        Candidates::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Kandydat został pomyślnie usunięty.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


    // Show Candidates for Santa
    public function ShowCandidatesNewSanta()
    {
        $show = Candidates::where('job_as', 'santa')->get();


        return view('admin.candidates.show_all_santa_candidates',compact('show'));
    }


    // Show Candidates for Elf
    public function ShowCandidatesNewElf()
    {
        $show = Candidates::where('job_as', 'elf')->get();


        return view('admin.candidates.show_all_elf_candidates',compact('show'));
    }


    // Show Candidates for Snowflake
    public function ShowCandidatesNewSnowflake()
    {
        $show = Candidates::where('job_as', 'snowflake')->get();


        return view('admin.candidates.show_all_snowflake_candidates',compact('show'));
    }


}

