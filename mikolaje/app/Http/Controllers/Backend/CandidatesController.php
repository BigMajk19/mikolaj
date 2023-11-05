<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Partners;
use App\Models\Candidates;
use Illuminate\Http\Request;
use App\Models\AreaVoivodeship;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CandidatesController extends Controller
{
    public function ShowAllCandidates ()
    {

        $show_candidates = Candidates::latest()->get();
        return view('admin.candidates.show_all_candidates',compact('show_candidates'));
    }

    public function AddCandidate()
    {
        $vareas = AreaVoivodeship::get();
        return view('backend.candidates.add_candidate', compact('vareas'));
    }

    public function StoreNewCandidate(Request $request)
    {

        $selectedVoivodeshipName = $request->input('selected_voivodeship_name');
        $voivodeshipName = AreaVoivodeship::where('voivodeship_name', $selectedVoivodeshipName)->value('voivodeship_name');

        if ($request->hasFile('candidate_photo')) {
          $photo = $request->file('candidate_photo');
          $photoFilename = date('YmdHis') . $photo->getClientOriginalName();
          $photo->move(public_path('upload/images/candidates'), $photoFilename);
          $photoPath = str_replace('upload/images/candidates', '', $photoFilename);
          } else {
              $photoPath = null;
          }

          if ($request->hasFile('cv')) {
              $cv = $request->file('cv');
              $cvFilename = date('YmdHis') . $cv->getClientOriginalName();
              $cv->move(public_path('upload/cv'), $cvFilename);
              $cvPath = str_replace('upload/cv', '', $cvFilename);
          } else {
              $cvPath = null;
          }

        Candidates::insert([

            'candidate_firstname' => $request->candidate_firstname,
            'candidate_lastname' => $request->candidate_lastname,
            'candidate_phone' => $request->candidate_phone,
            'candidate_email' => $request->candidate_email,
            'job_as' => $request->job_as,
            'candidate_city' => $request->candidate_city,
            'candidate_voivodeship' => $voivodeshipName,
            'candidate_age' => $request->candidate_age,
            'candidate_growth' => $request->candidate_growth,
            'candidate_weight' => $request->candidate_weight,
            'cloth_size' => $request->cloth_size,
            'exp_with_children' => $request->exp_with_children,
            'exp_as_santa' => $request->exp_as_santa,
            'drive_license' => $request->drive_license,
            'work_before_xmas' => $request->work_before_xmas,
            'work_at_xmas' => $request->work_at_xmas,
            'candidate_description' => $request->candidate_description,
            'candidate_photo' => $photoPath,
            'cv' => $cvPath,
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
            'candidate_city' => $request->candidate_city,
            'candidate_voivodeship' => $request->candidate_voivodeship,
            'candidate_age' => $request->candidate_age,
            'candidate_growth' => $request->candidate_growth,
            'candidate_weight' => $request->candidate_weight,
            'cloth_size' => $request->cloth_size,
            'exp_with_children' => $request->exp_with_children,
            'exp_as_santa' => $request->exp_as_santa,
            'drive_license' => $request->drive_license,
            'work_before_xmas' => $request->work_before_xmas,
            'work_at_xmas' => $request->work_at_xmas,
            'candidate_description' => $request->candidate_description,
            'privacy_policy' => $request->privacy_policy,
            'hired' => $request->hired,
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
        $show_new_santa = Candidates::where('job_as', 'santa')->get();


        return view('admin.candidates.show_all_santa_candidates',compact('show_new_santa'));
    }


    // Show Candidates for Elf
    public function ShowCandidatesNewElf()
    {
        $show_new_elf = Candidates::where('job_as', 'elf')->get();


        return view('admin.candidates.show_all_elf_candidates',compact('show_new_elf'));
    }


    // Show Candidates for Snowflake
    public function ShowCandidatesNewSnowflake()
    {
        $show_new_snowflake = Candidates::where('job_as', 'snowflake')->get();


        return view('admin.candidates.show_all_snowflake_candidates',compact('show_new_snowflake'));
    }

    // For Service Candidates
    public function SignCandidate($id)
    {
        $partners = Partners::where('partner_status', 'active')->get();
        $types = Candidates::findOrFail($id);
        return view('backend.candidates.sign_to_partner', compact('types','partners'));

    }

    public function SignCandidateToPartner(Request $request)
    {
        $cid = $request->id;

        // Walidacja danych po stronie serwera
        $request->validate([
            'partners_id' => 'required',
        ], [
            'partners_id.required' => 'Wybierz Partnera do przydzielenia wizyty',
        ]);

        $selectedIdPartner = $request->input('partners_id');
        $partnerName = Partners::where('id', $selectedIdPartner)->value('partner_name');

        Candidates::findOrFail($cid)->update([

            'partners_id' => $request->partners_id,
            'partner' => $partnerName,
        ]);
        $notification = array(
            'message' => 'Kandydat został pomyślnie przypisany do Partnera',
            'alert-type' => 'success',
        );
        return redirect()->route('show.all.candidates')->with($notification);
    }
}

