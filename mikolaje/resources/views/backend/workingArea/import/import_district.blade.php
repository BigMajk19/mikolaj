{{-- Początek HEAD --}}
@section('CSSscripts')


@endsection
{{-- Koniec HEAD --}}


{{-- Początek BODY --}}
@extends('admin.admin_dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">
  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <a href="{{ route('export.district') }}" class="btn btn-inverse-danger">Download Xlsx</a>
    </ol>
  </nav>


  <div class="row profile-body">
    <div class="col-md-8 col-xl-8 middle-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="card rounded">
            <div class="card-header">
              <h4>Importuj dzielnice</h4>
            </div>
            <div class="card-body">
              <form id="myForm" method="post" action="{{ route('import.district.file') }}"
                class="forms-sample" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                  <label for="ImportDistrict" class="form-label">Import pliku Excel</label>
                  <input type="file" name= "import_district" class="form-control">
                </div>
                <button type="submit" class="btn btn-inverse-success">Upload</button>
                <a href="{{ route('show.working.area') }}" class="btn btn-inverse-warning">Cofnij</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- middle wrapper end -->
  </div>
</div>

@endsection

@section('JSscripts')

@endsection

{{-- koniec BODY --}}
