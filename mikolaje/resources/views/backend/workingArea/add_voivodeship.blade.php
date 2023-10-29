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
              <h4>Dodaj nowe województwo</h4>
            </div>
            <div class="card-body">
              <form id="myForm" method="post" action="{{ route('store.voivodeship') }}"
                class="forms-sample">
                @csrf
                <div class="form-group mb-3">
                  <label for="exampleInputUsername1" class="form-label">Nazwa województwa</label>
                  <input type="text" name= "voivodeship_name" class="form-control">
                </div>
                <button type="submit" class="btn btn-outline-success">Zapisz zmiany</button>
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
        type_name: {
          required : true,
        },


      },
      messages :{
        type_name: {
          required : 'Podaj nazwę kategorii.',
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
