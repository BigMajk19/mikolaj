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
                <form id="myForm" method="post" action="{{ route('update.candidate') }}"
                class="forms-sample">
                @csrf
                <h4>Dane Kandydata/ki</h4>
                <input type="hidden" name="id" value="{{$types->id}}">
                <div class="form-group row mb-3">
                  <div class="col-md-6">
                    Imię
                    <input type="text" name= "candidate_firstname" class="form-control"  value="{{ $types->candidate_firstname }}" required>
                  </div>
                  <div class="col-md-6">
                    Nazwisko
                    <input type="text" name= "candidate_lastname" class="form-control"  value="{{ $types->candidate_lastname }}" required>
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <div class="col-md-6">
                    Telefon
                    <input type="text" name= "candidate_phone" class="form-control"  value="{{ $types->candidate_phone }}" required>
                  </div>
                  <div class="col-md-6">
                    E-mail
                    <input name="candidate_email" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'email'" inputmode="email" value="{{ $types->candidate_email }}">
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <div class="col-md-4">
                    Praca jako:
                    <select class="form-select" id="jobAs" name="job_as" value="{{ $types->job_as }}">
                      <option value="santa">Mikołaj</option>
                      <option value="elf">Elf</option>
                      <option value="snowflake">Śnieżynka</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                    <label for="defaultconfig-4" class="col-form-label">Opisz siebie i swoje doświadczenie w kilku słowach:</label>
                    <textarea name="candidate_description" id="maxlength-textarea" class="form-control" maxlength="500" rows="8" value="{{ $types->candidate_description }}">{{ $types->candidate_description }}</textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    Gdzie chcesz pracować?
                    <input type="text" name= "location_city" class="form-control" value="{{ $types->location_city }}">
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <div class="col-md-3">
                    Ile masz lat?
                    <input type="text" name= "candidate_age" class="form-control" value="{{ $types->candidate_age }}">
                  </div>
                  <div class="col-md-3">
                    Wzrost
                    <input type="text" name= "candidate_growth" class="form-control" value="{{ $types->candidate_growth }}">
                  </div>
                  <div class="col-md-3">
                    Waga
                    <input type="text" name= "candidate_weight" class="form-control" value="{{ $types->candidate_weight }}">
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
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  @if($types->exp_as_santa == 'on')
                  <div class="form-check form-switch mb-2">
                    <input type="checkbox" checked name="exp_as_santa" class="form-check-input">
                    <label class="form-check-label" for="formSwitch1">Pracowałeś/aś jako Świety Mikołaj/Elf/Śniezynka?</label>
                  </div>
                  @else
                  <div class="form-check form-switch mb-2">
                    <input type="checkbox" name="exp_as_santa" class="form-check-input">
                    <label class="form-check-label" for="formSwitch1">Pracowałeś/aś jako Świety Mikołaj/Elf/Śniezynka?</label>
                  </div>
                  @endif
                </div>
                <div class="row mb-3">
                  @if($types->drive_license == 'on')
                  <div class="form-check form-switch mb-2">
                    <input type="checkbox" checked name="drive_license" class="form-check-input">
                    <label class="form-check-label" for="formSwitch1">Posiadasz prawo jazdy Kat. B?*</label>
                  </div>
                  @else
                  <div class="form-check form-switch mb-2">
                    <input type="checkbox" name="drive_license" class="form-check-input">
                    <label class="form-check-label" for="formSwitch1">Posiadasz prawo jazdy Kat. B?*</label>
                  </div>
                  @endif
                </div>
                <div class="row mb-3">
                  @if($types->work_at_xmas == 'on')
                  <div class="form-check form-switch mb-2">
                    <input type="checkbox" checked name="work_at_xmas" class="form-check-input">
                    <label class="form-check-label" for="formSwitch1">Czy praca w Wigilię 24 grudnia również Cię interesuje?</label>
                  </div>
                  @else
                  <div class="form-check form-switch mb-2">
                    <input type="checkbox" name="work_at_xmas" class="form-check-input">
                    <label class="form-check-label" for="formSwitch1">Czy praca w Wigilię 24 grudnia również Cię interesuje?</label>
                  </div>
                  @endif
                </div>
                <div class="row mb-3">
                  @if($types->exp_with_children == 'on')
                  <div class="form-check form-switch mb-2">
                    <input type="checkbox" checked name="exp_with_children" class="form-check-input">
                    <label class="form-check-label" for="formSwitch1">Czy masz doświadczenie w pracy z dziećmi?</label>
                  </div>
                  @else
                  <div class="form-check form-switch mb-2">
                    <input type="checkbox" name="exp_with_children" class="form-check-input">
                    <label class="form-check-label" for="formSwitch1">Czy masz doświadczenie w pracy z dziećmi?</label>
                  </div>
                  @endif
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
