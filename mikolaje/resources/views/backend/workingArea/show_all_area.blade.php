{{-- Początek HEAD --}}
@section('CSSscripts')


@endsection
{{-- Koniec HEAD --}}


{{-- Początek BODY --}}
@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">
  <h3>Obszar działania</h3>
  <br/>
{{-- Obszar działania --}}
  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <a href="{{ route('add.voivodeship') }}" class="btn btn-inverse-warning">Dodaj województwo</a>
    </ol>
  </nav>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Województwa</h6>
          <div class="table-responsive">
            <table id="example" class="table table-striped dt-responsive table-hover display nowrap">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Województwo</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @foreach($varea as $key => $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->voivodeship_name }}</td>
                  <td>
                    <a href="{{ route('edit.voivodeship',$item->id) }}" class="btn btn-inverse-success">Edycja</a>
                    <a href="{{ route('delete.voivodeship',$item->id) }}" class="btn btn-inverse-danger" id="deleteVoivodeship">Usuń</a>
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
      <a href="{{ route('add.city') }}" class="btn btn-inverse-warning">Dodaj miasto</a>
    </ol>
  </nav>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Miasta</h6>
          <div class="table-responsive">
            <table id="example" class="table table-striped dt-responsive table-hover display nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Województwo</th>
                  <th>Nazwa miasta</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @foreach($carea as $key => $item)
                @php
                  $vname = App\Models\AreaVoivodeship::where('id',$item->area_voivodeship_id)->value('voivodeship_name');
                @endphp
                <tr>
                  <td>{{ $item->id }}</td>
                  @if ($item->area_voivodeship_id)
                  <td> {{ $vname }}</td>
                  @endif
                  <td>{{ $item->city_name }}</td>
                  <td>{{ $item->status }}</td>
                  <td>
                    <a href="{{ route('edit.city',$item->id) }}" class="btn btn-inverse-success">Edycja</a>
                    <a href="{{ route('delete.city',$item->id) }}" class="btn btn-inverse-danger" id="deleteCity">Usuń</a>
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
