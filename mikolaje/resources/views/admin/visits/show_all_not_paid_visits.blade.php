{{-- Początek HEAD --}}
@section('CSSscripts')
{{-- for DataTables --}}
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.min.css') }}">
<script src="{{ asset('backend/assets/vendors/datatables.net/jquery.dataTables.min.css') }}"></script>
{{-- Responsive --}}
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendors/responsive/responsive.bootstrap5.min.css') }}">
{{-- ColReorder --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.7.0/css/colReorder.bootstrap5.min.css">
{{-- Date range filter DataTables --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
{{-- Select (blue stripe) --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.7.0/css/select.bootstrap5.min.css">

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
          <h6 class="card-title">Wizyty nie opłacone</h6>
          <div class="table-responsive">
            {{-- dataTableRangeFilter --}}
            @include('admin.visits.dataTableRangeFilter')
            {{-- END dataTableRangeFilter --}}
            {{-- DataTable --}}
            <table id="example" class="display table-hover table-sm table-striped dt-responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Rodzaj Wizyty: </th>
                  <th>Długość: </th>
                  <th>Data Wizyty: </th>
                  <th>Telefon: </th>
                  <th>Miejscowość: </th>
                  <th>Województwo: </th>
                  <th>Cena brutto: </th>
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
                  <td>{{ $item->city }}</td>
                  <td>{{ $item->voivodeship }}</td>
                  <td>{{ $item->price_net }}</td>

                  <td>
                    <a href="{{ route('paid.new.visit',$item->id) }}" class="btn btn-inverse-success" id="paid">Opłacono</a>&nbsp;&nbsp;&nbsp;
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
                    <th>Miejscowość</th>
                    <th>Województwo</th>
                    <th>Cena brutto</th>
                    <th></th>
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

{{-- JS for DataTables --}}
<script src="{{ asset('backend/assets/vendors/datatables.net/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.min.js') }}"></script>
{{-- DataTables Sorting --}}
<script src="{{ asset('backend/assets/sortingScript.js') }}"></script>
{{-- Responsive --}}
<script src="{{ asset('backend/assets/vendors/responsive/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/responsive/responsive.bootstrap5.min.js') }}"></script>
{{-- ColReorder --}}
<script src="https://cdn.datatables.net/colreorder/1.7.0/js/dataTables.colReorder.min.js"></script>
{{-- Date range filter DataTables --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
{{-- Select (blue stripe) --}}
<script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>


{{-- JS for DataTables --}}

@endsection

{{-- koniec BODY --}}
