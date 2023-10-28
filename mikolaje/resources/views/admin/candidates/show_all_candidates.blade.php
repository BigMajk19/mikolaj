{{-- Początek HEAD --}}
@section('CSSscripts')
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
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css"> --}}
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
      <a href="{{ route('add.candidate') }}" class="btn btn-inverse-warning">Dodaj Kandydata</a>
    </ol>
  </nav>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Kandydaci do pracy</h6>
          <div class="table-responsive">
            {{-- dataTableExample --}}
            <table id="example" class="display table-hover table-sm table-striped dt-responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Telefon: </th>
                  <th>Pkt. </th>
                  <th>Praca: </th>
                  <th>Lokalizacja: </th>
                  <th>Prawo jazdy: </th>
                  <th>Praca w Wigilię: </th>
                  <th class="all">Doświadczenie: </th>
                  <th>Wiek: </th>
                  <th>Wzrost: </th>
                  <th>Waga: </th>
                  <th>Rozmiar: </th>
                  <th>Imię i Nazwisko: </th>
                  <th class="none">Opis: </th>
                  <th>CV: </th>
                  <th><u>Przypisany do partnera:</u></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @foreach($show_candidates as $key => $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td><a href="tel:{{ $item->candidate_phone }}">{{ $item->candidate_phone }} </a></td>
                  <td>
                    @if($item->drive_license  !== 'on' ? $drive_pkt=0 : $drive_pkt=3)@endif
                    @if($item->work_at_xmas  !== 'on' ? $work_xmas_pkt=0 : $work_xmas_pkt=5)@endif
                    @if($item->exp_with_children  !== 'on' ? $exp_child_pkt=0 : $exp_child_pkt=1)@endif
                    @if($item->exp_as_santa !== 'on' ? $exp_santa_pkt=0 : $exp_santa_pkt=2)@endif
                    @php
                      echo ($drive_pkt+$work_xmas_pkt+$exp_child_pkt+$exp_santa_pkt)
                    @endphp
                  </td>
                  <td>
                    @if($item->job_as == 'santa')<span class="badge border border-danger text-danger">Mikołaj</span>
                    @elseif($item->job_as == 'elf')<span class="badge border border-success text-success">Elf</span>
                    @elseif($item->job_as == 'snowflake')<span class="badge border border-light text-light">Śnieżynka</span>
                    @endif
                  </td>
                  <td>{{ $item->location_city }}</td>
                  <td>
                    @if($item->drive_license  == 'on') Tak
                    @elseif ($item->drive_license  == NULL) Nie
                    @endif
                  </td>
                  <td>
                    @if($item->work_at_xmas  == 'on') Tak
                    @elseif ($item->work_at_xmas  == NULL) Nie
                    @endif
                  </td>
                  <td>
                    @if($item->exp_with_children  == 'on') Praca z dziećmi: <b> Tak </b><br/>
                    @endif
                    @if($item->exp_as_santa  == 'on') Praca jako Mikołaj: <b>Tak</b>
                    @endif</td>
                  <td>{{ $item->candidate_age }}</td>
                  <td>{{ $item->candidate_growth }}</td>
                  <td>{{ $item->candidate_weight }}</td>
                  <td>{{ $item->cloth_size }}</td>
                  <td>{{ $item->candidate_firstname }} {{ $item->candidate_lastname }}</td>
                  <td>{{ $item->candidate_description }}</td>
                  <td><img class="wd-300 ht-300 rounded-circle" src="{{ (!empty($item->cv)) ? url('upload/images/candidates/'.$item->cv) : url('upload/images/no_image.jpg') }}" ></td>
                  <td>{{ $item->partner }}</td>
                  <td>
                    <a href="{{ route('edit.candidate',$item->id) }}" class="btn btn-inverse-success">Edycja</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ route('delete.candidate',$item->id) }}" class="btn btn-inverse-danger" id="deleteCandidate">Usuń</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Telefon: </th>
                  <th>Pkt. </th>
                  <th>Praca: </th>
                  <th>Lokalizacja: </th>
                  <th>Prawo jazdy: </th>
                  <th>Praca w Wigilię: </th>
                  <th>Doświadczenie: </th>
                  <th>Wiek: </th>
                  <th>Wzrost: </th>
                  <th>Waga: </th>
                  <th>Rozmiar: </th>
                  <th>Imię i Nazwisko: </th>
                  <th>Opis: </th>
                  <th>CV: </th>
                  <th>Przypisany do partnera:</th>
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
{{-- Select (blue stripe) --}}
<script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>


{{-- JS for DataTables --}}

@endsection

{{-- koniec BODY --}}
