@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

  <div class="row">
    <div class="col-12 grid-margin">

    </div>
  </div>
  @php
    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);
  @endphp
  <div class="row profile-body">
    <div class="col-md-8 col-xl-8 middle-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="card rounded">
            <div class="card-header">
              <h4>Edytuj kategorię</h4>
            </div>
            <div class="card-body">
              <form method="post" action="{{ route('update.type') }}"
                class="forms-sample">
                @csrf
                <input type="hidden" name="id" value="{{$types->id}}">
                <div class="mb-3">
                  <label for="toUpdateVisitsCat" class="form-label">Wybierz kategorię</label>
                  <select class="form-select" id="toUpdateVisitsCat" name= "type_name">
                    <option>Prywatna</option>
                    <option>Przedszkolna</option>
                    <option>Firmowa</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInputUsername1" class="form-label">Ikona kategorii</label>
                  <input type="text" name= "type_icon" class="form-control
                  @error('type_icon') is-invalid @enderror" value="{{ $types->type_icon }}">

                  @error ('type_icon')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary me-2">Zapisz zmiany</button>
                <a href="{{ route('all.typevisits') }}" class="btn btn-inverse-warning">Cofnij</a>
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
