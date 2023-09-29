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
          <h6 class="card-title">Kandydatki na Śnieżynki</h6>
          <div class="table-responsive">
            {{-- dataTableExample --}}
            <table id="example" class="display table-hover table-sm table-striped dt-responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Telefon: </th>
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
              </thead>

              <tbody>
                @foreach($show_new_snowflake as $key => $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td><a href="tel:{{ $item->candidate_phone }}">{{ $item->candidate_phone }} </a></td>
                  <td>{{ $item->job_as }}</td>
                  <td>{{ $item->location_city }}</td>
                  <td>
                    @if($item->drive_license  == '1') Tak
                    @elseif ($item->drive_license  == '0') Nie
                    @endif
                  </td>
                  <td>
                    @if($item->work_at_xmas  == '1') Tak
                    @elseif ($item->work_at_xmas  == '0') Nie
                    @endif
                  </td>
                  <td>
                    Praca z dziećmi:
                    <b> @if($item->exp_with_children  == '1') Tak
                    @elseif ($item->exp_with_children  == '0') Nie
                    @endif</b><br/>
                    Praca jako Śnieżynka:
                    <b> @if($item->exp_as_santa  == '1') Tak
                    @elseif ($item->exp_as_santa  == '0') Nie
                    @endif</b></td>
                  <td>{{ $item->candidate_age }}</td>
                  <td>{{ $item->candidate_growth }}</td>
                  <td>{{ $item->candidate_weight }}</td>
                  <td>{{ $item->cloth_size }}</td>
                  <td>{{ $item->candidate_firstname }} {{ $item->candidate_lastname }}</td>
                  <td>{{ $item->candidate_description }}</td>
                  <td>{{ $item->cv }}</td>
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
