@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <a href="{{ route('add.type') }}" class="btn btn-inverse-warning">Dodaj kategorię</a>
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
                  <th>No</th>
                  <th>Type name</th>
                  <th>Type icon</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @foreach($types as $key => $item)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $item->type_name }}</td>
                  <td>{{ $item->type_icon }}</td>
                  <td>
                    <a href="{{ route('edit.type_visits',$item->id) }}" class="btn btn-inverse-success">Edycja</a>
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
</div>


@endsection
