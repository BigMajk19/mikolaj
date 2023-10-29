{{-- Początek HEAD --}}
@section('CSSscripts')

@endsection
{{-- Koniec HEAD --}}


{{-- Początek BODY --}}

@extends('admin.admin_dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">

  <div class="row">
    <div class="col-12 grid-margin">

    </div>
  </div>
  {{-- @php
    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);
  @endphp --}}
  <div class="row profile-body">
    <div class="col-md-8 col-xl-8 middle-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="card rounded">
            <div class="card-header">
              <h4>Dodaj nowego Kandydata</h4>
            </div>
            <div class="card-body">
              <form id="myForm" method="post" action="{{ route('store.candidate') }}"
                class="forms-sample" enctype="multipart/form-data">
                @csrf
                <h4>Dane Kandydata/ki</h4>
                {{-- Imię i nazwisko --}}
                <div class="form-group row mb-3">
                  <div class="col-md-6">
                    <input type="text" name= "candidate_firstname" class="form-control" placeholder="Imię" required>
                  </div>
                  <div class="col-md-6">
                    <input type="text" name= "candidate_lastname" class="form-control" placeholder="Nazwisko" required>
                  </div>
                </div>
                {{-- Telefon i email --}}
                <div class="form-group row mb-3">
                  <div class="col-md-6">
                    <input type="text" name= "candidate_phone" class="form-control" placeholder="Telefon" required>
                  </div>
                  <div class="col-md-6">
                    <input name="candidate_email" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'email'" inputmode="email" placeholder="E-mail">
                  </div>
                </div>
                {{-- Praca jako --}}
                <div class="form-group row mb-3">
                  <div class="col-md-4">
                    <select class="form-select" id="jobAs" name="job_as" >
                      <option selected="" disabled="">Praca jako:</option>
                      <option value="santa">Mikołaj</option>
                      <option value="elf">Elf</option>
                      <option value="snowflake">Śnieżynka</option>
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
                <div class="form-group row mb-3">
                {{-- Lokalizacja --}}
                  <div class="col-md-6">
                    <input type="text" name= "candidate_city" class="form-control" placeholder="Gdzie chcesz pracować?">
                  </div>
                  <div class="col-md-6">
                    <input type="text" name= "candidate_voivodeship" class="form-control" placeholder="Województwo">
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <div class="col-md-3">
                    <input type="text" name= "candidate_age" class="form-control" placeholder="Ile masz lat?">
                  </div>
                  <div class="col-md-3">
                    <input type="text" name= "candidate_growth" class="form-control" placeholder="Wzrost">
                  </div>
                  <div class="col-md-3">
                    <input type="text" name= "candidate_weight" class="form-control" placeholder="Waga">
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
                    <input type="checkbox" name="work_before_xmas" class="form-check-input">
                    <label class="form-check-label" for="formSwitch1">Czy praca poza Wigilią 24 grudnia również Cię interesuje?</label>
                  </div>
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
                  <input class="form-control" name="candidate_photo" type="file" id="image">
                </div>
                <br/>
                <button type="submit" class="btn btn-outline-success">Zapisz zmiany</button>&nbsp;&nbsp;&nbsp;
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


<script type="text/javascript">
    $(document).ready(function (){
      $('#myForm').validate({
        rules: {
          candidate_firstname: {
            required : true,
          },
          candidate_lastname: {
            required : true,
          },
          candidate_phone: {
            required : true,
          },
          candidate_email: {
            required : true,
          },
          job_as: {
            required : true,
          },
          location_city: {
            required : true,
          },
          candidate_age: {
            required : true,
          },
          candidate_growth: {
            required : true,
          },
          candidate_weight: {
            required : true,
          },
          cloth_size: {
            required : true,
          },


        },
        messages :{
          candidate_firstname: {
            required : 'Podaj imię',
          },
          candidate_lastname: {
            required : 'Podaj Nazwisko',
          },
          candidate_phone: {
            required : 'Podaj nr telefonu',
          },
          candidate_email: {
            required : 'Podaj adres email',
          },
          job_as: {
            required : 'Wybierz rolę w pracy',
          },
          location_city: {
            required : 'Podaj miasto, w którym chcesz się pracować',
          },
          candidate_age: {
            required : 'Podaj swój wiek',
          },
          candidate_growth: {
            required : 'Podaj swój wzrost',
          },
          candidate_weight: {
            required : 'Podaj swoją wagę',
          },
          cloth_size: {
            required : 'Podaj swój rozmiar ubrań',
          },


        },
        errorElement : 'span',
        errorPlacement: function (error,element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight : function(element, errorClass, validClass){
          $(element).addClass('is-invalid');
        },
        unhighlight : function(element, errorClass, validClass){
          $(element).removeClass('is-invalid');
        },
      });
    });
  </script>

  @endsection

  @section('JSscripts')
  <script src="{{ asset('backend/assets/js/code/validate.min.js') }}"></script>
  @endsection
