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
              <h4>Dodaj nowego Kandydata</h4>
            </div>
            <div class="card-body">
              <form method="post" action="{{ route('store.candidate') }}"
                class="forms-sample" enctype="multipart/form-data">
                @csrf
                <h4>Dane Kandydata/ki</h4>
                {{-- Imię i nazwisko --}}
                <div class="row mb-3">
                  <div class="col-md-6">
                    <input type="text" name= "candidate_firstname" class="form-control
                    @error('candidate_firstname') is-invalid @enderror" placeholder="Imię" required>

                    @error ('candidate_firstname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <input type="text" name= "candidate_lastname" class="form-control
                    @error('candidate_lastname') is-invalid @enderror" placeholder="Nazwisko" required>

                    @error ('candidate_lastname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                {{-- Telefon i email --}}
                <div class="row mb-3">
                  <div class="col-md-6">
                    <input type="text" name= "candidate_phone" class="form-control
                    @error('candidate_phone') is-invalid @enderror" placeholder="Telefon" required>

                    @error ('candidate_phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <input name="candidate_email" class="form-control mb-4 mb-md-0
                    @error('candidate_email') is-invalid @enderror" data-inputmask="'alias': 'email'" inputmode="email" placeholder="E-mail">

                    @error ('candidate_email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                {{-- Praca jako --}}
                <div class="row mb-3">
                  <div class="col-md-4">
                    <select class="form-select" id="jobAs" name="job_as" >
                      <option selected="" disabled="">Praca jako:</option>
                      <option value="santa">Mikołaj</option>
                      <option value="elf">Elf</option>
                      <option value="snowflake">Śnieżynka</option>
                      @error ('job_as')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </select>
                  </div>
                </div>
                {{-- Opis osoby --}}
                <div class="row mb-3">
                  <div class="col-md-12">
                    <label for="defaultconfig-4" class="col-form-label">Opisz siebie i swoje doświadczenie w kilku słowach:</label>
                    <textarea name="candidate_description" id="maxlength-textarea" class="form-control" maxlength="500" rows="8" placeholder="Możesz wpisać maksymalnie 500 znaków"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                {{-- Lokalizacja --}}
                  <div class="col-md-6">
                    <input type="text" name= "location_city" class="form-control
                    @error('location_city') is-invalid @enderror" placeholder="Gdzie chcesz pracować?">

                    @error ('location_city')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-3">
                    <input type="text" name= "candidate_age" class="form-control
                    @error('candidate_age') is-invalid @enderror" placeholder="Ile masz lat?">

                    @error ('candidate_age')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-3">
                    <input type="text" name= "candidate_growth" class="form-control
                    @error('candidate_growth') is-invalid @enderror" placeholder="Wzrost">

                    @error ('candidate_growth')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-3">
                    <input type="text" name= "candidate_weight" class="form-control
                    @error('candidate_weight') is-invalid @enderror" placeholder="Waga">

                    @error ('candidate_weight')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-3">
                    <select class="form-select" id="clothSize" name="cloth_size" >
                      <option selected="" disabled="">Rozmiar ubrań</option>
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
                <div class="row mb-3">
                  <label for="exampleInputEmail1" class="form-label">Zdjęcie profilowe</label>
                  <input class="form-control" name="cv" type="file" id="image">
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
