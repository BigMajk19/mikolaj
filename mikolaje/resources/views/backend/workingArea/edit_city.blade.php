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
  <div class="row profile-body">
    <div class="col-md-8 col-xl-8 middle-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="card rounded">
            <div class="card-header">
              <h4>Edytuj miasto</h4>
            </div>
            <div class="card-body">
              <form id="myForm" method="post" action="{{ route('update.city') }}"
                class="forms-sample">
                @csrf
                <input type="hidden" name="id" value="{{$carea->id}}">
                <div class="form-group mb-3">
                  <label for="VoivodeshipName" class="form-label">Województwo</label>
                  <select class="form-select" id="VoivodeshipName" name= "area_voivodeship_id">
                    @foreach($varea as $key => $item)
                    <option value="{{ $item->id }}" {{ $item->id == $carea->area_voivodeship_id ? 'selected' : '' }}>{{ $item->voivodeship_name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label for="CityName" class="form-label">Nazwa Miasta</label>
                  <input type="text" name= "city_name" id="CityName" value= "{{ $carea->city_name }}" class="form-control">
                </div>
                <div class="form-group mb-3">
                  <label for="CityStatus" class="form-label">Status</label>
                  <select class="form-select" id="CityStatus" name= "status">
                    <option selected="" disabled=""value="{{ $carea->status }}">{{ $carea->status }}</option>
                    <option value="active">Active</option>
                    <option value="not_active">Not active</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary me-2">Zapisz zmiany</button>
                <a href="{{ route('show.working.area') }}" class="btn btn-inverse-warning">Cofnij</a>
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
        area_voivodeship_id: {
          required : true,
        },
        city_name: {
          required : true,
        },
        status: {
          required : true,
        },


      },
      messages :{
        area_voivodeship_id: {
          required : 'Proszę wybrać województwo.',
        },
        city_name: {
          required : 'Proszę wpisać nazwę miasta.',
        },
        status: {
          required : 'Wybierz status dla miasta.',
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

{{-- koniec BODY --}}
