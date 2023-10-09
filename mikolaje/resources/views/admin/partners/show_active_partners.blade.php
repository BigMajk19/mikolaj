{{-- Początek HEAD --}}
@section('CSSscripts')
{{-- for DataTables --}}
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.min.css') }}">
<script src="{{ asset('backend/assets/vendors/datatables.net/jquery.dataTables.min.css') }}"></script>
{{-- Responsive --}}
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendors/responsive/responsive.bootstrap5.min.css') }}">
{{-- ColReorder --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.7.0/css/colReorder.bootstrap5.min.css">

{{-- end for DataTables --}}

@endsection
{{-- Koniec HEAD --}}


{{-- Początek BODY --}}
@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

  <nav class="page-breadcrumb">
    {{-- <ol class="breadcrumb">
      <a href="{{ route('add.partner') }}" class="btn btn-inverse-warning">Dodaj Kandydata</a>
    </ol> --}}
  </nav>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Współpracujący Partnerzy</h6>
          <div class="table-responsive">
            {{-- dataTableExample --}}
            <table id="example" class="display table-hover table-sm table-striped dt-responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Telefon: </th>
                  <th>Nazwa: </th>
                  <th>Email: </th>
                  <th>NIP: </th>
                  <th>Województwo: </th>
                  <th>Miasto: </th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @foreach($active_partners as $key => $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td><a href="tel:{{ $item->partner_phone }}">{{ $item->partner_phone }} </a></td>
                  <td>{{ $item->partner_name }}</td>
                  <td>{{ $item->partner_email }}</td>
                  <td>{{ $item->partner_NIP }}</td>
                  <td>{{ $item->partner_voivodeship }}</td>
                  <td>{{ $item->partner_city }}</td>
                  <td>
                    <a href="{{ route('edit.partner',$item->id) }}" class="btn btn-inverse-success">Edycja</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ route('delete.partner',$item->id) }}" class="btn btn-inverse-danger" id="deleteCandidate">Usuń</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Telefon: </th>
                  <th>Nazwa: </th>
                  <th>Email:</th>
                  <th>NIP: </th>
                  <th>Województwo: </th>
                  <th>Miasto: </th>
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
{{-- JS for DataTables --}}

@endsection

{{-- koniec BODY --}}
