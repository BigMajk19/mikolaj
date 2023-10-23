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
              <h4>Edytuj dzielnicę</h4>
            </div>
            <div class="card-body">
              <form id="myForm" method="post" action="{{ route('update.district') }}"
                class="forms-sample">
                @csrf
                <input type="hidden" name="id" value="{{$darea->id}}">
                <div class="form-group mb-3">
                  <label for="CityName" class="form-label">Miasto</label>
                  <select class="form-select" id="CityName" name= "area_city_id">
                    @foreach($carea as $key => $item)
                    <option value="{{ $item->id }}" {{ $item->id == $darea->area_city_id ? 'selected' : '' }}>{{ $item->city_name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label for="DistrictName" class="form-label">Nazwa Dzielnicy</label>
                  <input type="text" name= "district_name" id="DistrictName" value= "{{ $darea->district_name }}" class="form-control">
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
        area_city_id: {
          required : true,
        },
        district_name: {
          required : true,
        },


      },
      messages :{
        area_city_id: {
          required : 'Wybierz nazwę miasta.',
        },
        district_name: {
          required : 'Wpisz nazwę dzielnicy.',
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
