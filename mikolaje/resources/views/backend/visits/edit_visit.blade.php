{{-- Początek HEAD --}}
@section('CSSscripts')

<link rel="stylesheet" href="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.css') }}">
@endsection

@section('JSscripts')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="{{ asset('backend/assets/js/code/getVisitDataInEditForm.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/flatpickr.js') }}"></script>
<script>
    var visitIdFromBackend = "{{ $vnames }}";
</script>
@endsection
{{-- Koniec HEAD --}}


{{-- Początek BODY --}}
@extends('admin.admin_dashboard')

@section('admin')



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
              <h4>Edycja Wizyty #{{ $visits->id }}</h4>
            </div>
            <div class="card-body">
              <form id="myForm" method="post" action="{{ route('update.visit') }}"
                class="forms-sample">
                @csrf
                <input type="hidden" name="id" value="{{$visits->id}}">
                <h4>Dane wizyty</h4>
                <div class="form-group row mb-3">
                  <div class="col-md-6">
                    <label for="typeName">Rodzaj wizyty:</label>
                    <select class="form-select" id="typeName" name="visits_type_id" >
                      @foreach($types as $key => $item)
                      <option value="{{ $item->id }}" {{ $item->id == $visits->visits_type_id ? 'selected' : '' }}>{{ $item->type_name }}</option>
                      @endforeach
                    </select>
                    <input type="hidden" id="selectedTypeName" name="selected_type_name" value="">
                  </div>
                  <div class="col-md-6">
                    <label for="visitName">Nazwa wizyty:</label>
                    <select class="form-select" id="visitName" name="visit_name" >
                      <option selected="" value="{{ $visits->visits_name_id }}">{{ $visits->visit_name }}</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <div class="col-md-3">
                    <label for="lengthVisit">Długość wizyty</label>
                    <input type="text" class="form-control" id="lengthVisit" name="length_visit" readonly value="{{ $vnames->length_visit }}">
                  </div>
                  <div class="col-md-2">
                    <label for="visit_qty">Ilość wizyt:</label>
                    <input type="number" id="visit_qty" name= "visit_qty" class="form-control" value="{{ $visits->visit_qty }}" placeholder="Ilość" required min='1'>
                  </div>
                  <div class="col-md-3">
                    <label for="guaranted">Godz. gwar.</label>
                    <select class="form-select" id="guaranted" name="guaranted" value="{{ $visits->guaranted }}">
                      <option value="no">Nie</option>
                      <option value="yes">Tak</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="priceNet">Cena netto</label>
                    <input type="text" name= "price_net" id="priceNet" class="form-control" readonly value="{{ $vnames->visit_price_net }}">
                  </div>
                  <div class="col-md-4">
                    <label for="priceGross">Cena brutto</label>
                    <input type="text" name= "price_gross" id="priceGross" class="form-control" readonly value="{{ $vnames->visit_price_gross }}">
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <div class="col-md-4">
                    <label for="intervalHours">Przedział godzinowy</label>
                    <select class="form-select" id="intervalHours" name="interval_hours"  value="{{ $visits->interval_hours }}">
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
                    <label for="visit_date">Data wizyty</label>
                    <div class="input-group flatpickr" id="flatpickr-date">
                      <input type="text" name= "visit_date" id="visit_date" class="form-control flatpickr-input" value="{{ $visits->visit_date }}" data-input="" >
                      <span class="input-group-text input-group-addon" data-toggle=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="preffered_time">Preferowana godz.</label>
                    <div class="input-group flatpickr" id="flatpickr-time">
                      <input type="text" name="preffered_time" id="preffered_time" value="{{ $visits->preffered_time }}" class="form-control flatpickr-input" data-input="" >
                      <span class="input-group-text input-group-addon" data-toggle="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></span>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                    <label for="maxlength-textarea" class="col-form-label">Informacje dodatkowe</label>
                    <textarea name="additional_information" id="maxlength-textarea" class="form-control" maxlength="500" rows="8" value="{{ $visits->additional_information }}"></textarea>
                  </div>
                </div>
                <h4>Dane Zamawiającego</h4>
                <!-- Dane zamawiającego Osoba prywatna -->
                <div class="form-group row mb-3">
                  <div class="col-md-6">
                    <label for="client_firstname">Imię</label>
                    <input type="text" name= "client_firstname" id="client_firstname"class="form-control" value="{{ $visits->client_firstname }}">
                  </div>
                  <div class="col-md-6">
                    <label for="client_lastname">Nazwisko</label>
                    <input type="text" name= "client_lastname" id="client_lastname"class="form-control" value="{{ $visits->client_lastname }}">
                  </div>
                  <div class="col-md-3">
                    <label for="phone">Telefon</label>
                    <input type="text" name= "phone" id="phone" class="form-control" value="{{ $visits->phone }}">
                  </div>
                  <div class="col-md-3">
                    <label for="email">Email</label>
                    <input name="email" id="email" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'email'" inputmode="email" value="{{ $visits->email }}">
                  </div>
                </div>
                @if($visits->invoice == 'on')
                <div class="form-check form-switch mb-2">
                  <input type="checkbox" checked id="invoiceSwitcher" name="invoice" class="form-check-input">
                  <label class="form-check-label" for="invoiceSwitcher">Chcę otrzymać fakturę</label>
                </div>
                @else
                <div class="form-check form-switch mb-2">
                  <input type="checkbox" id="invoiceSwitcher" name="invoice" class="form-check-input">
                  <label class="form-check-label" for="invoiceSwitcher" value="{{ $visits->invoice }}">Chcę otrzymać fakturę</label>
                </div>
                @endif
                <!-- Dane zamawiającego Firma -->
                <div id="additionalFieldsInvoice" style="display: none;">
                  <div class="row mb-3">
                    <div class="col-md-3">
                      <label for="nip">NIP</label>
                      <input type="text" name= "invoice_NIP" id="nip" class="form-control" value="{{ $visits->invoice_NIP }}">
                    </div>
                    <div class="col-md-4">
                      <label for="companyName">Nazwa firmy</label><input type="text" name= "invoice_company_name" id="companyName" class="form-control" value="{{ $visits->invoice_company_name }}">
                    </div>
                    <div class="col-md-5">
                      <label for="companyAdress">Adres siedziby</label>
                      <input type="text" name= "invoice_company_adress" id="companyAdress" value="{{ $visits->invoice_company_adress }}" class="form-control">
                    </div>
                  </div>
                </div>
                <!-- Dane adresowe wizyty -->
                <h4>Dane adresowe wizyty</h4>
                <div class="row mb-3">
                  <div id="additionalFields" style="display: none;">
                    <div class="col-md-12">
                      <label for="companyVisitPlace">Nazwa placówki</label>
                      <input type="text" id= "companyVisitPlace" name= "facility_name" class="form-control" value="{{ $visits->facility_name }}">
                    </div>
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <div class="col-md-6">
                    <label for="street">Ulica</label>
                    <input type="text" name= "street_address" id="street" class="form-control" value="{{ $visits->street_address }}">
                  </div>
                  <div class="col-md-3">
                    <label for="streetNum">Nr ulicy</label>
                    <input type="text" name= "street_number" id="streetNum" class="form-control" value="{{ $visits->street_number }}">
                  </div>
                  <div class="col-md-3">
                    <label for="flatNum">Nr lok.</label>
                    <input type="text" name= "flat_number" id="flatNum" class="form-control" value="{{ $visits->flat_number }}">
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <div class="col-md-4">
                    <label for="voivodeshipName">Województwo:</label>
                    <select class="form-select" id="voivodeshipName" name="voivodeship" >
                      @foreach($vareas as $item)
                        <option value="{{ $item->id }}" {{ $item->voivodeship_name == $visits->voivodeship ? 'selected' : '' }}>{{ $item->voivodeship_name }}</option>
                      @endforeach
                    </select>
                    <input type="hidden" id="selectedVoivodeshipName" name="selected_voivodeship_name" value="">
                  </div>
                  <div class="col-md-4">
                    {{-- Nowy kod --}}
                    <label for="cityName">Miasto</label>
                    <select class="form-select" id="cityName" name="city">
                      <option selected="" value="{{ $visits->city }}">{{ $visits->city }}</option>
                    </select>
                  </div>
                  <div class="col-md-4" id="districtField" style="{{ $visits->district ? 'display: block;' : 'display: none;' }}">
                    <label for="districtName">Dzielnica</label>
                    <select class="form-select" id="districtName" name="district">
                      <option selected="" disabled="" value="{{ $visits->district }}">{{ $visits->district }}</option>
                    </select>
                  </div>
                  <div class="col-md-4" id="countiesField" style="{{ $visits->counties ? 'display: block;' : 'display: none;' }}">
                    <label for="counties">Miejscowość</label>
                    <input type="text" name= "counties" id="counties" class="form-control" value="{{ $visits->counties }}">
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <div class="col-md-4">
                    <label for="zipcode">Kod pocztowy</label>
                    <input name="zipcode" id="zipcode" value="{{ $visits->zipcode }}" class="form-control" data-inputmask-alias="99-999" inputmode="text">
                  </div>

                  <div class="col-md-4" id="driveFeeField" style="display: none">
                    <label for="driveFee">Opłata dojazdowa</label>
                    <select class="form-select" id="driveFee" name="drive_fee" value="{{ $visits->drive_fee }}">
                      <option value="50">10 km - 50 zł</option>
                      <option value="100">20 km - 100 zł</option>
                      <option value="150">30 km - 150 zł</option>
                    </select>
                  </div>
                </div><br/><br/>
                <!-- Podsumowanie -->
                <div class="row mb-3">
                  <h3>Podsumowanie</h3><br/><br/>
                  <table id="example" class="table table-striped dt-responsive table-hover display nowrap">
                    <thead>
                      <tr>
                        <th>Nazwa</th>
                        <th>Długość</th>
                        <th>Cena netto</th>
                        <th>Cena brutto</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td id="selectedTypeHeader"></td>
                        <td id="lengthVisitCell"></td>
                        <td id="priceVisitNetCell"></td>
                        <td id="priceVisitGrossCell"></td>
                      </tr>
                      <tr>
                        <td id="driveFeeHeader"></td>
                        <td id=""></td>
                        <td id="priceDriveFeeNetCell"></td>
                        <td id="priceDriveFeeGrossCell"></td>
                      </tr>
                      <tr>
                        <td id="guarantedFeeHeader"></td>
                        <td id=""></td>
                        <td id="guarantedFeeNetCell"></td>
                        <td id="guarantedFeeGrossCell"></td>
                      </tr>
                      <tr>
                        <td id=""><b>Łącznie do zapłaty:</b></td>
                        <td id=""></td>
                        <td id="totalPriceNetCell"></td>
                        <td id="totalPriceGrossCell"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <br/>
                <input type="hidden" id="totalLengthInput" name="totalLength">
                <input type="hidden" id="totalPriceNetInput" name="totalPriceNet">
                <input type="hidden" id="totalPriceGrossInput" name="totalPriceGross">
                <!-- Zgody -->
                @if($visits->accepted_statue == 'on')
                <div class="form-group form-check form-switch mb-2">
                  <input type="checkbox" checked name="accepted_statue" id="accepted_statue" class="form-check-input">
                  <label class="form-check-label" for="accepted_statue">Akceptuję Regulamin</label>
                </div>
                @else
                <div class="form-check form-switch mb-2">
                  <input type="checkbox" name="accepted_statue" id="accepted_statue"class="form-check-input">
                  <label class="form-check-label" for="accepted_statue">Akceptuję Regulamin</label>
                </div>
                @endif
                @if($visits->accepted_marketing == 'on')
                <div class="form-check form-switch mb-2">
                  <input type="checkbox" checked name="accepted_marketing" id="accepted_marketing"class="form-check-input">
                  <label class="form-check-label" for="accepted_marketing">Zgoda marketingowa</label>
                </div>
                @else
                <div class="form-check form-switch mb-2">
                  <input type="checkbox" name="accepted_marketing" id="accepted_marketing"class="form-check-input">
                  <label class="form-check-label" for="accepted_marketing">Zgoda marketingowa</label>
                </div>
                @endif
                @if($visits->remind_visit == 'on')
                  <div class="form-check form-switch mb-2">
                    <input type="checkbox" checked id="remind_visit" name="remind_visit" class="form-check-input">
                    <label class="form-check-label" for="remind_visit">Przypomnij o wizycie</label>
                  </div>
                @else
                  <div class="form-check form-switch mb-2">
                    <input type="checkbox" id="remind_visit" name="remind_visit" class="form-check-input">
                    <label class="form-check-label" for="remind_visit">Przypomnij o wizycie</label>
                  </div>
                @endif
                <br/>
                <button type="submit" class="btn btn-outline-success">Zapisz zmiany</button>&nbsp;&nbsp;&nbsp;
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


<script src="{{ asset('backend/assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/bootstrap-maxlength.js') }}"></script>
@endsection
