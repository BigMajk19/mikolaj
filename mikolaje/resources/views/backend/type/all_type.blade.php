{{-- Początek HEAD --}}
@section('CSSscripts')


@endsection
{{-- Koniec HEAD --}}


{{-- Początek BODY --}}
@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">
{{-- Kategorie wizyt --}}
  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <a href="{{ route('add.type') }}" class="btn btn-outline-warning">Dodaj kategorię</a>
    </ol>
  </nav>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Kategorie Wizyt</h6>
          <div class="table-responsive">
            <table id="example" class="table table-striped dt-responsive table-hover display nowrap">
              <thead>
                <tr>
                  <th>NR</th>
                  <th>Typ wizyty</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @foreach($types as $key => $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->type_name }}</td>
                  <td>{{ $item->type_icon }}</td>
                  <td>
                    <a href="{{ route('edit.type_visits',$item->id) }}" class="btn btn-outline-light">Edycja</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ route('delete.type_visits',$item->id) }}" class="btn btn-inverse-danger" id="delete">Usuń</a>
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
{{-- Rodzaje wizyt --}}
  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <a href="{{ route('add.name.visit') }}" class="btn btn-outline-warning">Dodaj rodzaj wizyty</a>
    </ol>
  </nav>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Rodzaje Wizyt</h6>
          <div class="table-responsive">
            <table id="example" class="table table-striped dt-responsive table-hover display nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Typ wizyty</th>
                  <th>Nazwa wizyty</th>
                  <th>Długość wizyty</th>
                  <th>Cena netto</th>
                  <th>Cena brutto</th>
                  <th>Zdjęcie</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @foreach($names as $key => $item)
                @php
                  $vname = App\Models\VisitsType::where('id',$item->visits_type_id)->value('type_name');
                @endphp
                <tr>
                  <td>{{ $item->id }}</td>
                  @if ($item->visits_type_id)
                  <td> {{ $vname }}</td>
                  @endif
                  <td>{{ $item->visit_name }}</td>
                  <td>{{ $item->visit_length }} min.</td>
                  <td>{{ $item->visit_price_net }} PLN</td>
                  <td>{{ $item->visit_price_gross }} PLN</td>
                  <td>{{ $item->visit_image }}</td>
                  <td>
                    <a href="{{ route('edit.name.visit',$item->id) }}" class="btn btn-outline-light">Edycja</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ route('delete.name.visit',$item->id) }}" class="btn btn-inverse-danger" id="delete">Usuń</a>
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


@endsection

{{-- koniec BODY --}}
