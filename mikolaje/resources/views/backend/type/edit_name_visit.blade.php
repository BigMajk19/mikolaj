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
              <h4>Edytuj rodzaj wizyty</h4>
            </div>
            <div class="card-body">
              <form id="myForm" method="post" action="{{ route('update.name.visit') }}"
                class="forms-sample">
                @csrf
                <input type="hidden" name="id" value="{{$names->id}}">
                <div class="form-group mb-3">
                  <label for="exampleInputUsername1" class="form-label"><b>Nazwa kategorii</b></label>
                  <select class="form-select" id="toUpdateVisitsCat" name= "visits_type_id">
                    @foreach($types as $key => $item)
                    <option value="{{ $item->id }}" {{ $item->id == $names->visits_type_id ? 'selected' : '' }}>{{ $item->type_name }}</option>
                    @endforeach
                  </select>
                  </div>
                  <div class="form-group mb-3">
                    <label for="exampleInputUsername1" class="form-label"><b>Nazwa wizyty</b></label>
                    <input type="text" name= "visit_name" class="form-control" value="{{ $names->visit_name }}">
                  </div>
                  <div class="form-group mb-3">
                    <label for="exampleInputUsername1" class="form-label"><b>Długość wizyty</b></label>
                    <input type="text" name= "visit_length" class="form-control" value="{{ $names->visit_length }}">
                  </div>
                  <div class="form-group mb-3">
                    <label for="netInput" class="form-label"><b>Cena netto</b></label>
                    <input type="text" name= "visit_price_net" class="form-control"  id="netInput" oninput="calculateGross()" value="{{ $names->visit_price_net }}">
                  </div>
                  <div class="form-group mb-3">
                    <label for="grossInput" class="form-label"><b>Cena brutto</b></label>
                    <input type="text" name= "visit_price_gross" class="form-control" id="grossInput" value="{{ $names->visit_price_gross }}">
                  </div>
                <button type="submit" class="btn btn-inverse-info">Zapisz zmiany</button>&nbsp;&nbsp;&nbsp;
                <a href="{{ route('all.typevisits') }}" class="btn btn-inverse-warning">Cofnij</a>
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
          type_name: {
            required : true,
          },
          visit_name: {
            required : true,
          },
          visit_length: {
            required : true,
          },
          visit_price_net: {
            required : true,
          },
          visit_price_gross: {
            required : true,
          },


        },
        messages :{
          type_name: {
            required : 'Wybierz nazwę kategorii wizyty',
          },
          visit_name: {
            required : 'Podaj nazwę wizyty',
          },
          visit_length: {
            required : 'Podaj długość wizyty',
          },
          visit_price_net: {
            required : 'Podaj kwotę netto wizyty',
          },
          visit_price_gross: {
            required : 'Podaj kwotę brutto wizyty',
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
  <script src="{{ asset('backend/assets/js/code/calculateGrossPrice.js') }}"></script>

  @endsection

  {{-- koniec BODY --}}
