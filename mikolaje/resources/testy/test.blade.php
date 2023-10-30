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
          <select class="form-select" id="typeName" name="type_name" >
            @foreach($types as $key => $item)
            <option value="{{ $item->id }}" {{ $item->type_name == $visits->type_name ? 'selected' : '' }}>{{ $item->type_name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-6">
          <label for="visitName">Nazwa wizyty:</label>
          <select class="form-select" id="visitName" name="visit_name" >
            <option selected="" value="{{ $visits->visit_name_id }}">{{ $visits->visit_name }}</option>
          </select>
        </div>
      </div>
      <div class="form-group row mb-3">
        <div class="col-md-3">
          <label for="lengthVisit">Długość wizyty</label>
          <input type="text" class="form-control" id="lengthVisit" name="length_visit" readonly value="{{ $vnames->visit_length }}">
        </div>
        <div class="col-md-2">
          <label for="visit_qty">Ilość wizyt:</label>
          <input type="number" id="visit_qty" name= "visit_qty" class="form-control" value="{{ $visits->visit_qty }}" placeholder="Ilość" required>
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

      <!-- Podsumowanie -->
      <div class="row mb-3">
        <h3>Podsumowanie</h3><br/><br/>
        <table id="example" class="table table-striped dt-responsive table-hover display nowrap">
          <thead>
            <tr>
              <th>Rodzaj wizyty</th>
              <th>Długość</th>
              <th>Cena netto</th>
              <th>Cena brutto</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td id="selectedTypeHeader"></td>
              <td id="lengthVisitCell"></td>
              <td id="priceNetCell"></td>
              <td id="priceGrossCell"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <br/>
      <input type="hidden" id="totalLengthInput" name="totalLength">
      <input type="hidden" id="totalPriceNetInput" name="totalPriceNet">
      <input type="hidden" id="totalPriceGrossInput" name="totalPriceGross">
      <!-- Zgody -->
