@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

  <nav class="page-breadcrumb">
    <ol class="breadcrumb">

    </ol>
  </nav>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Lista rezerwowa wizyt</h6>
          <div class="table-responsive">
            {{-- dataTableExample --}}
            <table id="example" class="table table-striped dt-responsive table-hover display nowrap">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Rodzaj Wizyty: </th>
                  <th>Długość: </th>
                  <th>Data Wizyty: </th>
                  <th>Telefon: </th>
                  <th>Przedział godzinowy: </th>
                  <th>GW: </th>
                  <th>Miejscowość: </th>
                  <th>Dzielnica: </th>
                  <th>Adres: </th>
                  <th>Województwo: </th>
                  <th>Przydziel: </th>
                  <th>Opcje: </th>
                </tr>
              </thead>

              <tbody>
                @foreach($show as $key => $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->type_name }} {{ $item->visit_name }}</td>
                  <td>{{ $item->length_visit*$item->visit_qty }} min.</td>
                  <td>{{ $item->visit_date }}</td>
                  <td>{{ $item->phone }}</td>
                  <td>{{ $item->interval_hours }}</td>
                  <td>{{ $item->guaranted }}</td>
                  <td>{{ $item->city }}</td>
                  <td>{{ $item->district }}</td>
                  <td><a target="blank" href="https://www.google.pl/maps/place/{{ $item->street_address }}+{{ $item->street_number }},+{{ $item->zipcode }}+{{ $item->city }}">
                    {{ $item->street_address }} {{ $item->street_number }} /{{ $item->flat_number }}</a></td>
                  <td>{{ $item->voivodeship }}</td>
                  <td>dropdown</td>
                  <td>
                    <a href="{{ route('change.status.new.visit',$item->id) }}" class="btn btn-inverse-success" id="reserve_to_new">Zmień status</a>
                    <a href="{{ route('cancel.new.visit',$item->id) }}" class="btn btn-inverse-danger" id="cancel">Anuluj wizytę</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Rodzaj Wizyty</th>
                    <th>Długość</th>
                    <th>Data Wizyty</th>
                    <th>Telefon</th>
                    <th>Przedział godzinowy</th>
                    <th>GW</th>
                    <th>Miejscowość</th>
                    <th>Dzielnica</th>
                    <th>Adres</th>
                    <th>Województwo</th>
                    <th>Przydziel</th>
                    <th>Opcje</th>
                  </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
