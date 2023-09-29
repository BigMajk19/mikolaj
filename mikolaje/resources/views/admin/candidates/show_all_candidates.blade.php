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
                  <th>dropdown</th>
                  <th>Opcje: </th>
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
                  <td>{{ $item->job_as }}</td>
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
                  <td>dropdown</td>
                  <td>
                    <a href="{{ route('edit.candidate',$item->id) }}" class="btn btn-inverse-success">Edycja</a>
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
                  <th>dropdown</th>
                  <th>Opcje: </th>
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
