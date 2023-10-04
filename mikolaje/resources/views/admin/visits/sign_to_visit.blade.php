{{-- Początek HEAD --}}
@section('CSSscripts')
<link rel="stylesheet" href="{{ asset('backend/assets/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/vendors/jquery-tags-input/jquery.tagsinput.min.css') }}">

@endsection
{{-- Koniec HEAD --}}


{{-- Początek BODY --}}
@extends('admin.admin_dashboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">
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
              <h4>Przypisz partnera do wizyty: #{{ $types->id }}</h4>
            </div>
            <div class="card-body">
              <form id="myForm" method="post" action="{{ route('update.visit.sign.partner') }}"
                class="forms-sample">
                @csrf
                <input type="hidden" name="id" value="{{$types->id}}">
                <h4>Dane wizyty</h4>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <h6>Rodzaj wizyty</h6>
                    <input type="text" class="form-control" name="type_name" id="exampleInputDisabled1" disabled="" value="{{ $types->type_name }}">
                  </div>
                  <div class="col-md-4">
                    <h6>Nazwa wizyty</h6>
                    <input type="text" class="form-control" id="exampleInputDisabled1" disabled="" name="visit_name" value="{{ $types->visit_name }}">
                  </div>
                  <div class="col-md-4">
                    <h6>Data wizyty</h6>
                    <input type="text" class="form-control" id="exampleInputDisabled1" disabled="" value="{{ $types->visit_date }}">
                  </div>
                </div>
                <h4>Dane adresowe wizyty</h4>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <h6>Województwo</h6>
                    <input type="text" class="form-control" id="exampleInputDisabled1" disabled=""  value="{{ $types->voivodeship }}">
                  </div>
                  <div class="col-md-4">
                    <h6>Miasto</h6>
                    <input type="text" class="form-control" id="exampleInputDisabled1" disabled="" value="{{ $types->city }}">
                  </div>
                  <div class="col-md-4">
                    <h6>Miejscowość (okoliczna)</h6>
                    <input type="text" class="form-control" id="exampleInputDisabled1" disabled="" value="{{ $types->counties }}">
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <div class="col-md-6">
                    <select class="js-example-basic-single form-select select2-hidden-accessible" data-width="100%" data-select2-id="2" tabindex="-1" aria-hidden="true" id="choosePartner" name="partner">
                      <option selected="" disabled="">Wybierz partnera</option>
                      <option>Partner 1</option>
                      <option>Partner 2</option>
                      <option>Partner 3</option>
                    </select>
                  </div>
                </div>
                <br/>
                <button type="submit" class="btn btn-inverse-success">Zapisz zmiany</button>&nbsp;&nbsp;&nbsp;
                <a href="{{ route('show.visits.not_sign_to') }}" class="btn btn-inverse-warning">Cofnij</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function (){
    $('#myForm').validate({
      rules: {
        partner: {
          required : true,
        },


      },
      messages :{
        partner: {
          required : 'Wybierz Partnera do przydzielenia wizyty',
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
<script src="{{ asset('backend/assets/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/select2.js') }}"></script>
<script src="{{ asset('backend/assets/js/code/validate.min.js') }}"></script>

@endsection

{{-- koniec BODY --}}
