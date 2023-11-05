{{-- Początek HEAD --}}
@section('CSSscripts')
<link rel="stylesheet" href="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.css') }}">
@endsection

@section('JSscripts')
<script src="{{ asset('backend/assets/js/code/candidateDataForm.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
@endsection
{{-- Koniec HEAD --}}


{{-- Początek BODY --}}
@extends('admin.admin_dashboard')

@section('admin')

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> --}}


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
                <div class="form-group row mb-3">
                  <div class="col-md-4">
                    <label for="candidate_firstname">Imię</label>
                    <input type="text" class="form-control" name="candidate_firstname" id="candidate_firstname" disabled="" value="{{ $types->candidate_firstname }}">
                  </div>
                  <div class="col-md-4">
                    <label for="candidate_lastname">Nazwisko</label>
                    <input type="text" class="form-control" id="candidate_lastname" disabled="" name="candidate_lastname" value="{{ $types->candidate_lastname }}">
                  </div>
                  <div class="col-md-4">
                    <label for="job_as">Praca jako:</label>
                    <input type="text" class="form-control" name="job_as" id="job_as" disabled="" value="{{ $types->job_as }}">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <label for="candidate_city">Miasto</label>
                    @if ($types->candidate_city === 'Inne')
                      <input type="text" class="form-control" name="candidate_county" id="candidate_county" disabled=""  value="{{ $types->candidate_county }}">

                    @elseif ($types->candidate_city !== 'Inne')
                      <input type="text" class="form-control" name="candidate_city" id="candidate_city" disabled=""  value="{{ $types->candidate_city }}">
                    @endif
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <div class="col-md-6">
                    <label for="partners_id">Przypisz partnera</label>
                    <select class="form-select" id="choosePartner" name="partners_id" required>
                      <option selected="" disabled="">Wybierz partnera</option>
                      @foreach($partners as $key => $item)
                      <option value="{{ $item->id }}">{{ $item->partner_name }} - {{ $item->partner_voivodeship }}</option>
                      @endforeach
                    </select>
                    <input type="hidden" id="selectedNamePartner" name="selected_name_partner" value="">
                  </div>
                </div>
                <br/>
                <button type="submit" class="btn btn-outline-success">Przypisz partnera</button>&nbsp;&nbsp;&nbsp;
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
        partners_id: {
            required : true,
        },
      },
      messages :{
        partners_id: {
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
{{-- <script src="{{ asset('backend/assets/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/select2.js') }}"></script> --}}
<script src="{{ asset('backend/assets/js/code/validate.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/flatpickr.js') }}"></script>
@endsection

{{-- koniec BODY --}}
