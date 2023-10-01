{{-- Początek HEAD --}}


{{-- Koniec HEAD --}}

{{-- Początek BODY --}}

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
<script src="{{ asset('backend/assets/js/bootstrap-maxlength.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>

<script src="{{ asset('backend/assets/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/dropzone/dropzone.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/dropify/dist/dropify.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/moment/moment.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<!-- End plugin js for this page -->

<script src="{{ asset('backend/assets/js/inputmask.js') }}"></script>
<script src="{{ asset('backend/assets/js/select2.js') }}"></script>
<script src="{{ asset('backend/assets/js/typeahead.js') }}"></script>
<script src="{{ asset('backend/assets/js/tags-input.js') }}"></script>
<script src="{{ asset('backend/assets/js/dropzone.js') }}"></script>
<script src="{{ asset('backend/assets/js/dropify.js') }}"></script>
<script src="{{ asset('backend/assets/js/flatpickr.js') }}"></script>
<!-- End Custom Plugin js for this page -->
<!-- Start datatable -->

<script src="{{ asset('backend/assets/vendors/datatables.net/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/datatables.net/jquery.dataTables.min.css') }}"></script>
<script src="{{ asset('backend/assets/vendors/responsive/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/responsive/responsive.bootstrap5.min.js') }}"></script>
<!-- dodatki do DataTables-->
<script src="https://cdn.datatables.net/colreorder/1.7.0/js/dataTables.colReorder.min.js"></script>
<script src="https://cdn.datatables.net/autofill/2.6.0/js/dataTables.autoFill.min.js"></script>
<script src="https://cdn.datatables.net/autofill/2.6.0/js/autoFill.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/searchbuilder/1.5.0/js/dataTables.searchBuilder.min.js"></script>
<script src="https://cdn.datatables.net/searchbuilder/1.5.0/js/searchBuilder.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
<script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/keytable/2.10.0/js/dataTables.keyTable.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>


<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>

<!-- koniec dodatków -->

<!-- End datatable -->

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

{{-- koniec BODY --}}
