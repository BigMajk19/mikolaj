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
              <h4>Dodaj nazwę rodzaju Wizyty</h4>
            </div>
            <div class="card-body">
              <form id="myForm" method="post" action="{{ route('store.name.visit') }}"
                class="forms-sample">
                @csrf
                <div class="form-group mb-3">
                  <label for="exampleInputUsername1" class="form-label">Nazwa kategorii</label>
                  <select class="form-select" id="toUpdateVisitsCat" name= "type_name">
                    <option selected="" disabled="">Wybierz kategorię</option>
                    @foreach($types as $key => $item)
                    <option>{{ $item->type_name }}</option>
                    @endforeach
                  </select>

                </div>
                <div class="form-group mb-3">
                  <label for="exampleInputUsername1" class="form-label">Nazwa wizyty</label>
                  <input type="text" name= "visit_name" class="form-control">
                </div>
                <div class="form-group mb-3">
                  <label for="exampleInputUsername1" class="form-label">Długość wizyty</label>
                  <input type="text" name= "visit_length" class="form-control">
                </div>
                <div class="form-group mb-3">
                  <label for="exampleInputUsername1" class="form-label">Cena netto</label>
                  <input type="text" name= "visit_price_net" class="form-control" id="visit_price_net">
                </div>
                <div class="form-group mb-3">
                  <label for="exampleInputUsername1" class="form-label">Cena brutto</label>
                  <input type="text" name= "visit_price_gross" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary me-2">Zapisz zmiany</button>
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

@endsection

{{-- koniec BODY --}}
