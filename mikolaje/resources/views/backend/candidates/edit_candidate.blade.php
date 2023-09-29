@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

  <div class="row">
    <div class="col-12 grid-margin">

    </div>
  </div>
  @php
    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);
  @endphp
  <div class="row profile-body">
    <div class="col-md-8 col-xl-8 middle-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="card rounded">
            <div class="card-header">
              <h4>Edycja Kandydata #{{ $types->id }}</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('update.candidate') }}"
                class="forms-sample">
                @csrf
                <h4>Dane Kandydata/ki</h4>
                <input type="hidden" name="id" value="{{$types->id}}">
                <div class="row mb-3">
                  <div class="col-md-6">
                    Imię
                    <input type="text" name= "candidate_firstname" class="form-control
                    @error('candidate_firstname') is-invalid @enderror"  value="{{ $types->candidate_firstname }}" required>

                    @error ('candidate_firstname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    Nazwisko
                    <input type="text" name= "candidate_lastname" class="form-control
                    @error('candidate_lastname') is-invalid @enderror"  value="{{ $types->candidate_lastname }}" required>

                    @error ('candidate_lastname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    Telefon
                    <input type="text" name= "candidate_phone" class="form-control
                    @error('candidate_phone') is-invalid @enderror"  value="{{ $types->candidate_phone }}" required>

                    @error ('candidate_phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    E-mail
                    <input name="candidate_email" class="form-control mb-4 mb-md-0
                    @error('candidate_email') is-invalid @enderror" data-inputmask="'alias': 'email'" inputmode="email" value="{{ $types->candidate_email }}">

                    @error ('candidate_email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    Praca jako:
                    <select class="form-select" id="jobAs" name="job_as" value="{{ $types->candidate_email }}">
                      <option value="santa">Mikołaj</option>
                      <option value="elf">Elf</option>
                      <option value="snowflake">Śnieżynka</option>
                      @error ('job_as')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                    <label for="defaultconfig-4" class="col-form-label">Opisz siebie i swoje doświadczenie w kilku słowach:</label>
                    <textarea name="candidate_description" id="maxlength-textarea" class="form-control" maxlength="500" rows="8" value="{{ $types->candidate_description }}"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    Gdzie chcesz pracować?
                    <input type="text" name= "location_city" class="form-control
                    @error('location_city') is-invalid @enderror" value="{{ $types->location_city }}">

                    @error ('location_city')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-3">
                    Ile masz lat?
                    <input type="text" name= "candidate_age" class="form-control
                    @error('candidate_age') is-invalid @enderror" value="{{ $types->candidate_age }}">

                    @error ('candidate_age')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-3">
                    Wzrost
                    <input type="text" name= "candidate_growth" class="form-control
                    @error('candidate_growth') is-invalid @enderror" value="{{ $types->candidate_growth }}">

                    @error ('candidate_growth')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-3">
                    Waga
                    <input type="text" name= "candidate_weight" class="form-control
                    @error('candidate_weight') is-invalid @enderror" value="{{ $types->candidate_weight }}">

                    @error ('candidate_weight')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-3">
                    Rozmiar ubrań
                    <select class="form-select" id="clothSize" name="cloth_size" value="{{ $types->cloth_size }}">
                      <option value="XS">XS</option>
                      <option value="S">S</option>
                      <option value="M">M</option>
                      <option value="L">L</option>
                      <option value="XL">XL</option>
                      <option value="XXL">XXL</option>
                      <option value="XXXL">XXXL</option>
                      @error ('cloth_size')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="form-check form-switch mb-2">
                    <input type="checkbox" name="exp_as_santa" class="form-check-input">
                    <label class="form-check-label" for="formSwitch1">Pracowałeś/aś jako Świety Mikołaj/Elf/Śniezynka?</label>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="form-check form-switch mb-2">
                    <input type="checkbox" name="drive_license" class="form-check-input">
                    <label class="form-check-label" for="formSwitch1">Posiadasz prawo jazdy Kat. B?*</label>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="form-check form-switch mb-2">
                    <input type="checkbox" name="work_at_xmas" class="form-check-input">
                    <label class="form-check-label" for="formSwitch1">Czy praca w Wigilię 24 grudnia również Cię interesuje?</label>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="form-check form-switch mb-2">
                    <input type="checkbox" name="exp_with_children" class="form-check-input">
                    <label class="form-check-label" for="formSwitch1">Czy masz doświadczenie w pracy z dziećmi?</label>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary me-2">Zapisz zmiany</button>
                <a href="{{ route('show.all.candidates') }}" class="btn btn-inverse-warning">Cofnij</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- middle wrapper end -->
  </div>

</div>



@endsection
