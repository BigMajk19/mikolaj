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
  <div class="row profile-body">
    <div class="col-md-8 col-xl-8 middle-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="card rounded">
            <div class="card-header">
              <h4>Przypisz partnera do Kandydata: #{{ $types->id }}</h4>
            </div>
            <div class="card-body">
              <form id="myForm" method="post" action="{{ route('update.sign.candidate') }}"
                class="forms-sample">
                @csrf
                <input type="hidden" name="id" value="{{$types->id}}">
                <h4>Dane Kandydata</h4>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <h6>Inię</h6>
                    <input type="text" class="form-control" name="candidate_firstname" id="exampleInputDisabled1" disabled="" value="{{ $types->candidate_firstname }}">
                  </div>
                  <div class="col-md-4">
                    <h6>Nazwisko</h6>
                    <input type="text" class="form-control" id="exampleInputDisabled1" disabled="" name="candidate_lastname" value="{{ $types->candidate_lastname }}">
                  </div>
                  <div class="col-md-4">
                    <h6>Praca jako:</h6>
                    <input type="text" class="form-control" name="job_as" id="exampleInputDisabled1" disabled="" value="{{ $types->job_as }}">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <h6>Miasto</h6>
                    <input type="text" class="form-control" name="location_city" id="exampleInputDisabled1" disabled=""  value="{{ $types->location_city }}">
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <div class="col-md-6">
                    <select class="js-example-basic-single form-select select2-hidden-accessible" data-width="100%" data-select2-id="2" tabindex="-1" aria-hidden="true" id="choosePartner" name="partner">
                      <option selected="" disabled="">Wybierz partnera</option>
                      @foreach($partners as $key => $item)
                      <option>{{ $item->partner_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <br/>
                <button type="submit" class="btn btn-inverse-success">Przypisz partnera</button>&nbsp;&nbsp;&nbsp;
                <a href="{{ route('show.all.candidates') }}" class="btn btn-inverse-warning">Cofnij</a>
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
