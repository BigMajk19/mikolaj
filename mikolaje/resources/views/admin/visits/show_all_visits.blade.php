@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <a href="{{ route('add.visit') }}" class="btn btn-inverse-warning">Dodaj Wizytę</a>
    </ol>
  </nav>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Wszystkie Wizyty</h6>
          <div class="table-responsive">
            {{-- dataTableExample --}}
            <table cellspacing="5" cellpadding="5">
              <tbody>
                <tr>
                  <td>Data wizyty min:</td>
                  <td><input type="text" id="min" name="min"></td>
                </tr>
                <tr>
                  <td>Data wizyty max:</td>
                  <td><input type="text" id="max" name="max"></td>
                </tr>
              </tbody>
            </table>
            <table id="example" class="display table-hover table-sm table-striped dt-responsive" cellspacing="0" width="100%">
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
                  <td><a href="tel:{{ $item->phone }}">{{ $item->phone }}</a></td>
                  <td>{{ $item->interval_hours }}</td>
                  <td>{{ $item->guaranted }}</td>
                  <td>{{ $item->city }}</td>
                  <td>{{ $item->district }}</td>
                  <td><a target="blank" href="https://www.google.pl/maps/place/{{ $item->street_address }}+{{ $item->street_number }},+{{ $item->zipcode }}+{{ $item->city }}">
                    {{ $item->street_address }} {{ $item->street_number }} /{{ $item->flat_number }}</a></td>
                  <td>{{ $item->voivodeship }}</td>
                  <td>dropdown</td>
                  <td>
                    <a href="{{ route('edit.visit',$item->id) }}" class="btn btn-inverse-success">Edycja</a>
                    <a href="{{ route('delete.visit',$item->id) }}" class="btn btn-inverse-danger" id="delete">Usuń</a>
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



@section('JSscripts')

<script>

    $(document).ready( function () {
      var table = $('#example').DataTable({
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
      });
      table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );

        let minDate, maxDate;

    // Custom filtering function which will search data in column four between two values
          DataTable.ext.search.push(function (settings, data, dataIndex) {
            let min = minDate.val();
            let max = maxDate.val();
            let date = new Date(data[3]);

            if (
              (min === null && max === null) ||
              (min === null && date <= max) ||
              (min <= date && max === null) ||
              (min <= date && date <= max)
            ) {
              return true;
            }
            return false;
          });

          // Create date inputs
          minDate = new DateTime('#min', {
            format: 'DD-MM-YYYY'
          });
          maxDate = new DateTime('#max', {
            format: 'DD-MM-YYYY'
          });

          // DataTables initialisation
          // let table = new DataTable('#example');

          // Refilter the table
          document.querySelectorAll('#min, #max').forEach((el) => {
            el.addEventListener('change', () => table.draw());
          });
      } );

      $.extend( $.fn.dataTable.defaults, {
        order: [[0, 'desc']],
        responsive: true,
        colReorder: true,
        keys: true,
      } );

    </script>

@endsection
