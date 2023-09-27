@extends('admin.admin_dashboard')

@section('admin')

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
              <h4>Edycja Wizyty #{{ $types->id }}</h4>
            </div>
            <div class="card-body">
              <form method="post" action="{{ route('update.visit') }}"
                class="forms-sample">
                @csrf
                <input type="hidden" name="id" value="{{$types->id}}">
                <h4>Dane wizyty</h4>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <h6>Rodzaj wizyty</h6>
                    <input type="text" class="form-control" name="type_name" id="exampleInputDisabled1" disabled="" value="{{ $types->type_name }}">
                  </div>
                  <div class="col-md-6">
                    <h6>Nazwa wizyty</h6>
                    <select class="form-select" id="visitName" name="visit_name" value="{{ $types->visit_name }}">
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
                <div class="row mb-3">
                  <div class="col-md-3">
                    <h6>Długość wizyty</h6>
                    <select class="form-select" id="lengthVisit" name="length_visit" value="{{ $types->length_visit }}">
                      <option value="10">10 min.</option>
                      <option value="20">20 min.</option>
                      <option value="30">30 min.</option>
                      <option value="60">60 min.</option>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <h6>Ilość</h6>
                    <input type="number" name= "visit_qty" class="form-control
                    @error('visit_qty') is-invalid @enderror" value="{{ $types->visit_qty }}" placeholder="Ilość" required>

                    @error ('visit_qty')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-3">
                    <h6>Gwar. godz.</h6>
                    <select class="form-select" id="guaranted" name="guaranted" value="{{ $types->guaranted }}">
                      <option value="no">Nie</option>
                      <option value="yes">Tak</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <h6>Cena</h6>
                    <input type="text" name= "price" class="form-control
                    @error('price') is-invalid @enderror" value="{{ $types->price }}">

                    @error ('price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <h6>Przedział godzinowy</h6>
                    <select class="form-select" id="intervalHours" name="interval_hours"  value="{{ $types->interval_hours }}">
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
                      @error ('interval_hours')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </select>
                  </div>
                  <div class="col-md-4">
                    <h6>Data wizyty</h6>
                    <div class="input-group flatpickr" id="flatpickr-date">
                      <input type="text" name= "visit_date" class="form-control flatpickr-input
                      @error('visit_date') is-invalid @enderror" value="{{ $types->visit_date }}" data-input="" >
                      <span class="input-group-text input-group-addon" data-toggle=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>

                      @error ('visit_date')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <h6>Preferowana godz.</h6>
                    <div class="input-group flatpickr" id="flatpickr-time">
                      <input type="text" name="preffered_time" value="{{ $types->preffered_time }}" class="form-control flatpickr-input" data-input="" readonly="readonly">
                      <span class="input-group-text input-group-addon" data-toggle="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></span>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                    <h4>Informacje dodatkowe</h4>
                    <textarea name="additional_information" id="maxlength-textarea" class="form-control" maxlength="500" rows="8" value="{{ $types->additional_information }}"></textarea>
                  </div>
                </div>
                <h4>Dane Zamawiającego</h4>
                <!-- Dane zamawiającego Osoba prywatna -->
                <div class="row mb-3">
                  <div class="col-md-6">
                    <h6>Imię i Nazwisko</h6>
                    <input type="text" name= "client_name" value="{{ $types->client_name }}" class="form-control
                    @error('client_name') is-invalid @enderror">

                    @error ('client_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-3">
                    <h6>Telefon</h6>
                    <input type="text" name= "phone" class="form-control
                    @error('phone') is-invalid @enderror" value="{{ $types->phone }}">

                    @error ('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-3">
                    <h6>E-mail</h6>
                    <input name="email" class="form-control mb-4 mb-md-0
                    @error('email') is-invalid @enderror" data-inputmask="'alias': 'email'" inputmode="email" value="{{ $types->email }}">

                    @error ('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-check form-switch mb-2">
                  <input type="checkbox" class="form-check-input">
                  <label class="form-check-label" for="formSwitch1">Chcę otrzymać fakturę</label>
                </div>
                <!-- Dane zamawiającego Firma -->
                <div class="row mb-3">
                  <div class="col-md-3">
                    <h6>NIP</h6>
                    <input type="text" name= "invoice_NIP" class="form-control
                    @error('invoice_NIP') is-invalid @enderror" value="{{ $types->invoice_NIP }}">

                    @error ('invoice_NIP')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-4">
                    <h6>Nazwa firmy</h6>
                    <input type="text" name= "invoice_company_name" class="form-control
                    @error('invoice_company_name') is-invalid @enderror" value="{{ $types->invoice_company_name }}">

                    @error ('invoice_company_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-5">
                    <h6>Adres siedziby</h6>
                    <input type="text" name= "invoice_company_adress" value="{{ $types->invoice_company_adress }}" class="form-control
                    @error('invoice_company_adress') is-invalid @enderror">

                    @error ('invoice_company_adress')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <!-- Dane adresowe wizyty -->
                <h4>Dane adresowe wizyty</h4>
                <div class="row mb-3">
                  <div class="col-md-12">
                    <label for="companyOrder" class="form-label">W przypadku zamówienia przez przedszkole lub firmę</label>
                    <h6>Nazwa placówki</h6>
                    <input type="text" id= "companyOrder" name= "facility_name" class="form-control" value="{{ $types->facility_name }}">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <h6>Ulica</h6>
                    <input type="text" name= "street_address" class="form-control
                    @error('street_address') is-invalid @enderror" value="{{ $types->street_address }}">

                    @error ('street_address')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-3">
                    <h6>Nr domu</h6>
                    <input type="text" name= "street_number" class="form-control
                    @error('street_number') is-invalid @enderror" value="{{ $types->street_number }}">

                    @error ('street_number')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-3">
                    <h6>Nr lok.</h6>
                    <input type="text" name= "flat_number" class="form-control
                    @error('flat_number') is-invalid @enderror" value="{{ $types->flat_number }}">

                    @error ('flat_number')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <h6>Województwo</h6>
                    <input type="text" name= "voivodeship" value="{{ $types->voivodeship }}" class="form-control
                    @error('voivodeship') is-invalid @enderror">

                    @error ('voivodeship')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-4">
                    <h6>Miasto</h6>
                    <input type="text" name= "city" class="form-control
                    @error('city') is-invalid @enderror" value="{{ $types->city }}">

                    @error ('city')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-4">
                    <h6>Dzielnica</h6>
                    <input type="text" name= "district" class="form-control" value="{{ $types->district }}">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <h6>Kod pocztowy</h6>
                    <input name="zipcode" value="{{ $types->zipcode }}" class="form-control
                    @error('zipcode') is-invalid @enderror" data-inputmask-alias="99-999" inputmode="text">

                    @error ('zipcode')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-4">
                    <h6>Miejscowość</h6>
                    <input type="text" name= "counties" class="form-control
                    @error('counties') is-invalid @enderror" value="{{ $types->counties }}">

                    @error ('counties')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-4">
                    <h6>Opłata dojazdowa</h6>
                    <select class="form-select" id="driveFee" name="drive_fee" value="{{ $types->drive_fee }}">
                      <option value="50">10 km - 50 zł</option>
                      <option value="100">20 km - 100 zł</option>
                      <option value="150">30 km - 150 zł</option>
                    </select>
                  </div>
                </div>
                <!-- Zgody -->
                @if($types->accepted_statue == 'on')
                <div class="form-check form-switch mb-2">
                  <input type="checkbox" checked name="accepted_statue" class="form-check-input" required>
                  <label class="form-check-label" for="formSwitch1">Akceptuję Regulamin</label>
                </div>
                @else
                <div class="form-check form-switch mb-2">
                  <input type="checkbox" name="accepted_statue" class="form-check-input" required>
                  <label class="form-check-label" for="formSwitch1">Akceptuję Regulamin</label>
                </div>
                @endif
                @if($types->accepted_marketing == 'on')
                <div class="form-check form-switch mb-2">
                  <input type="checkbox" checked name="accepted_marketing" class="form-check-input">
                  <label class="form-check-label" for="formSwitch1">Zgoda marketingowa</label>
                </div>
                @else
                <div class="form-check form-switch mb-2">
                  <input type="checkbox" name="accepted_marketing" class="form-check-input">
                  <label class="form-check-label" for="formSwitch1">Zgoda marketingowa</label>
                </div>
                @endif
                @if($types->remind_visit == 'on')
                  <div class="form-check form-switch mb-2">
                    <input type="checkbox" checked id="formSwitch1" name="remind_visit" class="form-check-input">
                    <label class="form-check-label" for="formSwitch1">Przypomnij o wizycie</label>
                  </div>
                @else
                  <div class="form-check form-switch mb-2">
                    <input type="checkbox" id="formSwitch1" name="remind_visit" class="form-check-input">
                    <label class="form-check-label" for="formSwitch1">Przypomnij o wizycie</label>
                  </div>
                @endif
                <button type="submit" class="btn btn-primary me-2">Zapisz zmiany</button>
                <a href="{{ route('show.all.visits') }}" class="btn btn-inverse-warning">Cofnij</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- middle wrapper end -->
  </div>

</div>



@endsection
