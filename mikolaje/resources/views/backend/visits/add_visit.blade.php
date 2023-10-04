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
              <h4>Dodaj nową Wizytę</h4>
            </div>
            <div class="card-body">
              <form id="myForm" method="post" action="{{ route('store.visit') }}" class="forms-sample">
                @csrf
                <h4>Dane wizyty</h4>
                <div class="form-group row mb-3">
                  <div class="col-md-6">
                    <select class="form-select" id="typeOfVisit" name="type_name" >
                      <option selected="" disabled="">Rodzaj wizyty</option>
                      <option>Prywatna</option>
                      <option>Przedszkolna</option>
                      <option>Firmowa</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <select class="form-select" id="visitName" name="visit_name" >
                      <option selected="" disabled="">Nazwa wizyty</option>
                      <option value="SzybkiPrezent">Prywatna - SzybkiPrezent</option>
                      <option value="Standard">Prywatna - Standard</option>
                      <option value="EkstraM">Prywatna - EkstraM</option>
                      <option value="Long">Prywatna - Long</option>
                      <option value="SzybkiMikołaj">Przedszkolna - SzybkiMikołaj</option>
                      <option value="StandardP">Przedszkolna - Standard</option>
                      <option value="NiestandardowaP">Przedszkolna - Niestandardowa</option>
                      <option value="SzybkaWizyta">Firmowa - SzybkaWizyta</option>
                      <option value="StandardF">Firmowa - Standard</option>
                      <option value="NiestandardowaF">Firmowa - Niestandardowa</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <div class="col-md-3">
                    <select class="form-select" id="lengthVisit" name="length_visit" >
                      <option selected="" disabled="">Długość wizyty</option>
                      <option value="10">10 min.</option>
                      <option value="20">20 min.</option>
                      <option value="30">30 min.</option>
                      <option value="60">60 min.</option>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <input type="number" name= "visit_qty" class="form-control" placeholder="Ilość" required>
                  </div>
                  <div class="col-md-3">
                    <select class="form-select" id="guaranted" name="guaranted">
                      <option selected="" disabled="">Gwarantowana</option>
                      <option value="no">Nie</option>
                      <option value="yes">Tak</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" name= "price" class="form-control" placeholder="Cena">
                  </div>
                </div>
                <div class="form-group form-group row mb-3">
                  <div class="col-md-4">
                    <select class="form-select" id="intervalHours" name="interval_hours" >
                      <option selected="" disabled="">Przedział godzinowy</option>
                      <option>08:00 - 10:00</option>
                      <option>08:15 - 10:15</option>
                      <option>08:30 - 10:30</option>
                      <option>08:45 - 10:45</option>
                      <option>09:00 - 11:00</option>
                      <option>09:15 - 11:15</option>
                      <option>09:30 - 11:30</option>
                      <option>09:45 - 11:45</option>
                      <option>10:00 - 12:00</option>
                      <option>10:15 - 12:15</option>
                      <option>10:30 - 12:30</option>
                      <option>10:45 - 12:45</option>
                      <option>11:00 - 13:00</option>
                      <option>11:15 - 13:15</option>
                      <option>11:30 - 13:30</option>
                      <option>11:45 - 13:45</option>
                      <option>12:00 - 14:00</option>
                      <option>12:15 - 14:15</option>
                      <option>12:30 - 14:30</option>
                      <option>12:45 - 14:45</option>
                      <option>13:00 - 15:00</option>
                      <option>13:15 - 15:15</option>
                      <option>13:30 - 15:30</option>
                      <option>13:45 - 15:45</option>
                      <option>14:00 - 16:00</option>
                      <option>14:15 - 16:15</option>
                      <option>14:30 - 16:30</option>
                      <option>14:45 - 16:45</option>
                      <option>15:00 - 17:00</option>
                      <option>15:15 - 17:15</option>
                      <option>15:30 - 17:30</option>
                      <option>15:45 - 17:45</option>
                      <option>16:00 - 18:00</option>
                      <option>16:15 - 18:15</option>
                      <option>16:30 - 18:30</option>
                      <option>16:45 - 18:45</option>
                      <option>17:00 - 19:00</option>
                      <option>17:15 - 19:15</option>
                      <option>17:30 - 19:30</option>
                      <option>17:45 - 19:45</option>
                      <option>18:00 - 20:00</option>
                      <option>18:15 - 20:15</option>
                      <option>18:30 - 20:30</option>
                      <option>18:45 - 20:45</option>
                      <option>19:00 - 21:00</option>
                      <option>19:15 - 21:15</option>
                      <option>19:30 - 21:30</option>
                      <option>19:45 - 21:45</option>
                      <option>20:00 - 22:00</option>
                      <option>20:15 - 22:15</option>
                      <option>20:30 - 22:30</option>
                      <option>20:45 - 22:45</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group flatpickr" id="flatpickr-date">
                      <input type="text" name= "visit_date" class="form-control flatpickr-input"  data-input="" placeholder="Data wizyty" >
                      <span class="input-group-text input-group-addon" data-toggle=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group flatpickr" id="flatpickr-time">
                      <input type="text" name="preffered_time" class="form-control flatpickr-input" placeholder="Preferowana godzina" data-input="" readonly="readonly">
                      <span class="input-group-text input-group-addon" data-toggle="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></span>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                    <label for="defaultconfig-4" class="col-form-label">Informacje dodatkowe</label>
                    <textarea name="additional_information" id="maxlength-textarea" class="form-control" maxlength="500" rows="8" placeholder="Możesz wpisać maksymalnie 500 znaków"></textarea>
                  </div>
                </div>
                <h4>Dane Zamawiającego</h4>
                <!-- Dane zamawiającego Osoba prywatna -->
                <div class="form-group row mb-3">
                  <div class="col-md-6">
                    <input type="text" name= "client_name" class="form-control" placeholder="Imię i Nazwisko">
                  </div>
                  <div class="col-md-3">
                    <input type="text" name= "phone" class="form-control" placeholder="Telefon">
                  </div>
                  <div class="col-md-3">
                    <input name="email" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'email'" inputmode="email" placeholder="E-mail">
                  </div>
                </div>
                <div class="form-check form-switch mb-2">
                  <input type="checkbox" class="form-check-input">
                  <label class="form-check-label" for="formSwitch1">Chcę otrzymać fakturę</label>
                </div>
                <!-- Dane zamawiającego Firma -->
                <div class="row mb-3">
                  <div class="col-md-3">
                    <input type="text" name= "invoice_NIP" class="form-control" placeholder="NIP">
                  </div>
                  <div class="col-md-4">
                    <input type="text" name= "invoice_company_name" class="form-control" placeholder="Nazwa firmy">
                  </div>
                  <div class="col-md-5">
                    <input type="text" name= "invoice_company_adress" class="form-control" placeholder="Adres siedziby">
                  </div>
                </div>
                <!-- Dane adresowe wizyty -->
                <h4>Dane adresowe wizyty</h4>
                <div class="row mb-3">
                  <div class="col-md-12">
                    <label for="companyOrder" class="form-label">W przypadku zamówienia przez przedszkole lub firmę</label>
                    <input type="text" id= "companyOrder" name= "facility_name" class="form-control" placeholder="Nazwa placówki">
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <div class="col-md-6">
                    <input type="text" name= "street_address" class="form-control" placeholder="Ulica">
                  </div>
                  <div class="col-md-3">
                    <input type="text" name= "street_number" class="form-control" placeholder="Nr domu">
                  </div>
                  <div class="col-md-3">
                    <input type="text" name= "flat_number" class="form-control" placeholder="Nr lok.">
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <div class="col-md-4">
                    <input type="text" name= "voivodeship" class="form-control" placeholder="Województwo">
                  </div>
                  <div class="col-md-4">
                    <input type="text" name= "city" class="form-control" placeholder="Miasto">
                  </div>
                  <div class="col-md-4">
                    <input type="text" name= "district" class="form-control" placeholder="Dzielnica">
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <div class="col-md-4">
                    <input name="zipcode" placeholder="Kod pocztowy" class="form-control" data-inputmask-alias="99-999" inputmode="text">
                  </div>
                  <div class="col-md-4">
                    <input type="text" name= "counties" class="form-control" placeholder="Miejscowość">
                  </div>
                  <div class="col-md-4">
                    <select class="form-select" id="driveFee" name="drive_fee" >
                      <option selected="" disabled="">Opłata dojazdowa</option>
                      <option value="50">10 km - 50 zł</option>
                      <option value="100">20 km - 100 zł</option>
                      <option value="150">30 km - 150 zł</option>
                    </select>
                  </div>
                </div>
                <!-- Zgody -->
                <div class="form-group form-check form-switch mb-2">
                  <input type="checkbox" name="accepted_statue" class="form-check-input" required>
                  <label class="form-check-label" for="formSwitch1">Akceptuję Regulamin</label>
                </div>
                <div class="form-check form-switch mb-2">
                  <input type="checkbox" name="accepted_marketing" class="form-check-input">
                  <label class="form-check-label" for="formSwitch1">Zgoda marketingowa</label>
                </div>
                <div class="form-check form-switch mb-2">
                  <input type="checkbox" name="remind_visit" class="form-check-input">
                  <label class="form-check-label" for="formSwitch1">Przypomnij o wizycie</label>
                </div>
                <br/>
                <button type="submit" class="btn btn-inverse-success">Zapisz zmiany</button>&nbsp;&nbsp;&nbsp;
                <a href="{{ route('show.all.visits') }}" class="btn btn-inverse-warning">Cofnij</a>
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
        type_name: {
          required : true,
        },
        visit_name: {
          required : true,
        },
        length_visit: {
          required : true,
        },
        guaranted: {
          required : true,
        },
        interval_hours: {
          required : true,
        },
        visit_date: {
          required : true,
        },
        preffered_time: {
          required : true,
        },
        client_name: {
          required : true,
        },
        phone: {
          required : true,
        },
        email: {
          required : true,
        },
        street_address: {
          required : true,
        },
        street_number: {
          required : true,
        },
        voivodeship: {
          required : true,
        },
        city: {
          required : true,
        },
        zipcode: {
          required : true,
        },
        visit_qty: {
          required : true,
        },
        price: {
          required : true,
        },
        accepted_statue: {
          required : true,
        },


      },
      messages :{
        type_name: {
          required : 'Podaj rodzaj wizyty',
        },
        visit_name: {
          required : 'Podaj nazwę wizyty',
        },
        length_visit: {
          required : 'Podaj długość wizyty',
        },
        guaranted: {
          required : 'Czy wizyta ma być gwarantowana?',
        },
        interval_hours: {
          required : 'Podaj przedział godzinowy',
        },
        visit_date: {
          required : 'Podaj datę wizyty',
        },
        preffered_time: {
          required : 'Podaj preferowaną godzinę wizyty',
        },
        client_name: {
          required : 'Podaj Imię i Nazwisko klienta',
        },
        phone: {
          required : 'Podaj telefon klienta',
        },
        email: {
          required : 'Podaj e-mail klienta',
        },
        street_address: {
          required : 'Podaj ulicę Wizyty',
        },
        street_number: {
          required : 'Podaj numer ulicy',
        },
        voivodeship: {
          required : 'Podaj województwo wizyty',
        },
        city: {
          required : 'Podaj miasto wizyty',
        },
        zipcode: {
          required : 'Podaj kod pocztowy wizyty',
        },
        visit_qty: {
          required : 'Musisz podać ilość wizyt',
        },
        price: {
          required : 'Proszę wpisać cenę',
        },
        accepted_statue: {
          required : 'Musisz zaakceptować Regulamin',
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
