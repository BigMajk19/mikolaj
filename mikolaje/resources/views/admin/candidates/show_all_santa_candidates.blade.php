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

    </ol>
  </nav>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Kandydaci na Mikołaja</h6>
          <div class="table-responsive">
            {{-- dataTableExample --}}
            <table id="example" class="display table-hover table-sm table-striped dt-responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Telefon: </th>
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
                  <th>Zdjęcie</th>
                  <th>CV: </th>
                  <th><u>Przypisany do partnera:</u></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @foreach($show_new_santa as $key => $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>
                    <a href="tel:{{ $item->candidate_phone }}">{{ $item->candidate_phone }} </a><br/>
                    @if($item->job_as == 'santa')<span class="badge rounded-pill border border-danger text-danger">Mikołaj</span>
                    @elseif($item->job_as == 'elf')<span class="badge rounded-pill border border-success text-success">Elf</span>
                    @elseif($item->job_as == 'snowflake')<span class="badge rounded-pill border border-light text-light">Śnieżynka</span>
                    @endif
                  </td>
                  <td>
                    @if ($item->candidate_city === 'Inne')
                     {{ $item->candidate_county }}
                    @elseif ($item->candidate_city !== 'Inne')
                     {{ $item->candidate_city }}
                    @endif
                  </td>
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
                    Praca z dziećmi:
                    <b> @if($item->exp_with_children  == 'on') Tak
                    @elseif ($item->exp_with_children  == NULL) Nie
                    @endif</b><br/>
                    Praca jako Mikołaj:
                    <b> @if($item->exp_as_santa  == 'on') Tak
                    @elseif ($item->exp_as_santa  == NULL) Nie
                    @endif</b></td>
                  <td>{{ $item->candidate_age }}</td>
                  <td>{{ $item->candidate_growth }}</td>
                  <td>{{ $item->candidate_weight }}</td>
                  <td>{{ $item->cloth_size }}</td>
                  <td>{{ $item->candidate_firstname }} {{ $item->candidate_lastname }}</td>
                  <td>{{ $item->candidate_description }}</td>
                  <td><img id="showImage" class="wd-300 ht-300" src="{{ (!empty($item->candidate_photo)) ? url('upload/images/candidates/'.$item->candidate_photo) : url('upload/images/no_image.png') }}" ></td>
                  <td>
                    @if (!empty($item->cv))
                    <a href="{{ url('upload/cv/'.$item->cv)}}" target="_blank">Pobierz CV</a>
                    @elseif(empty($item->cv))
                    Brak
                    @endif
                  </td>
                  <td>{{ $item->partner }}</td>
                  <td><br/>
                    <a href="{{ route('edit.candidate',$item->id) }}" class="btn btn-inverse-success">Edycja</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ route('sign.candidate',$item->id) }}" class="btn btn-inverse-warning" id="signCandidate">Przypisz kandydata</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ route('delete.candidate',$item->id) }}" class="btn btn-inverse-danger" id="deleteCandidate">Usuń</a>
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
{{-- Select (blue stripe) --}}
<script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>


{{-- JS for DataTables --}}

@endsection

{{-- koniec BODY --}}
