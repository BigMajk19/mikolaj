{{-- Początek HEAD --}}
@section('CSSscripts')
<style type="text/css">
    button.fred {
    background-color: #070d19;
    --bs-btn-color: #6571ff;
    --bs-btn-border-color: #6571ff;
    --bs-btn-hover-color: #fff;
    --bs-btn-hover-bg: #6571ff;
    --bs-btn-hover-border-color: #6571ff;
    --bs-btn-focus-shadow-rgb: 101, 113, 255;
    --bs-btn-active-color: #fff;
    --bs-btn-active-bg: #6571ff;
    --bs-btn-active-border-color: #6571ff;
    --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    --bs-btn-disabled-color: #6571ff;
    --bs-btn-disabled-bg: transparent;
    --bs-btn-disabled-border-color: #6571ff;
    --bs-gradient: none;
    }
    table.dataTable thead th {
    white-space: wrap
    }
  </style>
{{-- for DataTables --}}
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.min.css') }}">
<script src="{{ asset('backend/assets/vendors/datatables.net/jquery.dataTables.min.css') }}"></script>
{{-- Responsive --}}
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendors/responsive/responsive.bootstrap5.min.css') }}">
{{-- Buttons --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
{{-- ColReorder --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.7.0/css/colReorder.bootstrap5.min.css">
{{-- KeyTables --}}
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/keytable/2.10.0/css/keyTable.bootstrap5.min.css"> --}}
{{-- Date range filter DataTables --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">

{{-- end for DataTables --}}

@endsection
{{-- Koniec HEAD --}}


{{-- Początek BODY --}}
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
          <h6 class="card-title">Nowe wizyty nie potwierdzone</h6>
          <div class="table-responsive">
            {{-- dataTableRangeFilter --}}
            @include('admin.visits.dataTableRangeFilter')
            {{-- END dataTableRangeFilter --}}
            {{-- DataTable --}}
            <table id="example" class="display table table-hover table-sm table-striped dt-responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Rodzaj Wizyty: </th>
                  <th>Długość: </th>
                  <th>Data Wizyty: </th>
                  <th>Telefon: </th>
                  <th>Przedział godz. / <br>Godz. gwarantowana </th>
                  <th>GW: </th>
                  <th>Miejscowość: </th>
                  <th>Dzielnica: </th>
                  <th>Adres: </th>
                  <th>Województwo: </th>
                  <th>Przydziel: </th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @foreach($show as $key => $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td> {{ $item->visit_qty }}x {{ $item->type_name }} {{ $item->visit_name }}</td>
                  <td>{{ $item->length_visit }} min.</td>
                  <td>{{ $item->visit_date }}</td>
                  <td><a href="tel:{{ $item->phone }}">{{ $item->phone }}</a></td>
                  <td>
                    {{ $item->interval_hours === null ? $item->preffered_time : $item->interval_hours}}</td>
                  <td>{{ $item->guaranted }}</td>
                  <td>
                    @if ($item->city === 'Inne')
                     {{ $item->counties }}
                    @elseif ($item->city !== 'Inne')
                     {{ $item->city }}
                    @endif
                  </td>
                  <td>{{ $item->district }}</td>
                  <td><a target="blank" href="https://www.google.pl/maps/place/{{ $item->street_address }}+{{ $item->street_number }},+{{ $item->zipcode }}+{{ $item->city }}">
                    {{ $item->street_address }} {{ $item->street_number }} /{{ $item->flat_number }}</a></td>
                  <td>{{ $item->voivodeship }}</td>
                  <td>dropdown</td>
                  <td>
                    <a href="{{ route('confirm.new.visit',$item->id) }}" class="btn btn-outline-warning" id="confirm">Potwierdź Zgłoszenie</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ route('reserve.list.visit',$item->id) }}" class="btn btn-outline-info" id="confirm">Lista Rezerwowa</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ route('cancel.new.visit',$item->id) }}" class="btn btn-inverse-danger" id="cancel">Anuluj wizytę</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('JSscripts')

{{-- JS for DataTables --}}
<script src="{{ asset('backend/assets/vendors/datatables.net/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.min.js') }}"></script>
{{-- DataTables Sorting --}}
<script src="{{ asset('backend/assets/sortingScript.js') }}"></script>
{{-- Responsive --}}
<script src="{{ asset('backend/assets/vendors/responsive/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/responsive/responsive.bootstrap5.min.js') }}"></script>
{{-- Buttons --}}
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
{{-- ColReorder --}}
<script src="https://cdn.datatables.net/colreorder/1.7.0/js/dataTables.colReorder.min.js"></script>
{{-- KeyTables --}}
{{-- <script src="https://cdn.datatables.net/keytable/2.10.0/js/dataTables.keyTable.min.js"></script> --}}
{{-- Date range filter DataTables --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>


{{-- JS for DataTables --}}

@endsection

{{-- koniec BODY --}}
