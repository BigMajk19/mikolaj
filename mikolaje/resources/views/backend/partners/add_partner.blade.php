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
              <h4>Dodaj nowego Partnera</h4>
            </div>
            <div class="card-body">
              <form id="myForm" method="post" action="{{ route('store.partner') }}"
                class="forms-sample" enctype="multipart/form-data">
                @csrf
                <h4>Dane Partnera</h4>
                {{-- Imię i nazwisko --}}
                <div class="form-group row mb-3">
                  <div class="col-md-6">
                    <label for="partner_firstname">Imię</label>
                    <input type="text" name= "partner_firstname" id="partner_firstname" class="form-control" placeholder="Imię">
                  </div>
                  <div class="col-md-6">
                    <label for="partner_lastname">Nazwisko</label>
                    <input type="text" name= "partner_lastname" id="partner_lastname" class="form-control" placeholder="Nazwisko">
                  </div>
                </div>
                {{-- Telefon i email --}}
                <div class="form-group row mb-3">
                  <div class="col-md-6">
                    <label for="phone">Telefon</label>
                    <input type="text" name= "partner_phone" id="phone" class="form-control" placeholder="Telefon">
                  </div>
                  <div class="col-md-6">
                    <label for="email">Email</label>
                    <input name="partner_email" id="email" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'email'" inputmode="email" placeholder="E-mail">
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <div class="col-md-6">
                    <label for="partnerName">Nazwa firmy</label>
                    <input type="text" name= "partner_name" id="partnerName" class="form-control" placeholder="Nazwa firmy" >
                  </div>
                  <div class="col-md-6">
                    <label for="nip">NIP firmy</label>
                    <input type="text" name= "partner_NIP" id="nip" class="form-control" placeholder="NIP firmy" >
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <h5>Dane adresowe Partnera</h5>
                {{-- Lokalizacja --}}
                  <div class="col-md-6">
                    <label for="street">Ulica</label>
                    <input type="text" name= "partner_adress_street" id="street" class="form-control" placeholder="Ulica">
                  </div>
                  <div class="col-md-3">
                    <label for="streetNum">Nr ulicy</label>
                    <input type="text" name= "partner_adress_number" id="streetNum" class="form-control" placeholder="Nr ulicy">
                  </div>
                  <div class="col-md-3">
                    <label for="flatNum">Nr lok.</label>
                    <input type="text" name= "partner_adress_flat" id="flatNum" class="form-control" placeholder="Nr lokalu">
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <div class="col-md-3">
                    <label for="zipcode">Kod pocztowy</label>
                    <input name="partner_zipcode" id="zipcode" placeholder="Kod pocztowy" class="form-control" data-inputmask-alias="99-999" inputmode="text">
                  </div>
                  <div class="col-md-3">
                    <label for="city">Miasto</label>
                    <input type="text" name= "partner_city" id="city" class="form-control" placeholder="Podaj miasto">
                  </div>
                  <div class="col-md-3">
                    <label for="voivodeship">Województwo</label>
                    <input type="text" id="voivodeship" name= "partner_voivodeship" class="form-control" placeholder="Podaj województwo">
                  </div>
                  <div class="col-md-3">
                    <label for="country">Miejscowość</label>
                    <input type="text" id="country" name= "partner_country" class="form-control" placeholder="Podaj miejscowość">
                  </div>
                </div>
                <br/>
                <button type="submit" class="btn btn-inverse-success">Zapisz zmiany</button>&nbsp;&nbsp;&nbsp;
                <a href="{{ route('show.partners.active') }}" class="btn btn-inverse-warning">Cofnij</a>
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
          partner_name: {
            required : true,
          },
          partner_firstname: {
            required : true,
          },
          partner_lastname: {
            required : true,
          },
          partner_phone: {
            required : true,
          },
          partner_email: {
            required : true,
          },
          partner_NIP: {
            required : true,
          },
          partner_adress_street: {
            required : true,
          },
          partner_adress_number: {
            required : true,
          },
          partner_adress_flat: {
            required : true,
          },
          partner_zipcode: {
            required : true,
          },
          partner_city: {
            required : true,
          },
          partner_voivodeship: {
            required : true,
          },


        },
        messages :{
          partner_firstname: {
            required : 'Podaj imię',
          },
          partner_lastname: {
            required : 'Podaj Nazwisko',
          },
          partner_phone: {
            required : 'Podaj nr telefonu',
          },
          partner_email: {
            required : 'Podaj adres email',
          },
          partner_name: {
            required : 'Podaj nazwę firmy',
          },
          partner_NIP: {
            required : 'Podaj NIP firmy',
          },
          partner_adress_street: {
            required : 'Wpisz ulicę',
          },
          partner_adress_number: {
            required : 'Podaj nr. ulicy',
          },
          partner_adress_flat: {
            required : 'Podaj nr. lokalu',
          },
          partner_zipcode: {
            required : 'Podaj kod pocztowy',
          },
          partner_city: {
            required : 'Podaj miasto',
          },
          partner_voivodeship: {
            required : 'Podaj województwo',
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
