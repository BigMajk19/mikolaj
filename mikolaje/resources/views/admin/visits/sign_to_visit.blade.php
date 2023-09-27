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
              <h4>Edycja Wizyty #{{ $types->id }}</h4>
            </div>
            <div class="card-body">
              <form method="post" action="{{ route('update.visit.sign.partner') }}"
                class="forms-sample">
                @csrf
                <input type="hidden" name="id" value="{{$types->id}}">
                <h4>Dane wizyty</h4>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <h6>Rodzaj wizyty</h6>
                    <input type="text" class="form-control" name="type_name" id="exampleInputDisabled1" disabled="" value="{{ $types->type_name }}">
                  </div>
                  <div class="col-md-4">
                    <h6>Nazwa wizyty</h6>
                    <input type="text" class="form-control" id="exampleInputDisabled1" disabled="" name="visit_name" value="{{ $types->visit_name }}">
                  </div>
                  <div class="col-md-4">
                    <h6>Data wizyty</h6>
                    <input type="text" class="form-control" id="exampleInputDisabled1" disabled="" value="{{ $types->visit_date }}">
                  </div>
                </div>
                <h4>Dane adresowe wizyty</h4>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <h6>Województwo</h6>
                    <input type="text" class="form-control" id="exampleInputDisabled1" disabled=""  value="{{ $types->voivodeship }}">
                  </div>
                  <div class="col-md-4">
                    <h6>Miasto</h6>
                    <input type="text" class="form-control" id="exampleInputDisabled1" disabled="" value="{{ $types->city }}">
                  </div>
                  <div class="col-md-4">
                    <h6>Miejscowość (okoliczna)</h6>
                    <input type="text" class="form-control" id="exampleInputDisabled1" disabled="" value="{{ $types->counties }}">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <select class="form-select" id="choosePartner" name="partner" >
                      <option selected="" disabled="">Wybierz partnera</option>
                      <option>Partner 1</option>
                      <option>Partner 2</option>
                      <option>Partner 3</option>
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary me-2">Zapisz zmiany</button>
                <a href="{{ route('show.visits.not_sign_to') }}" class="btn btn-inverse-warning">Cofnij</a>
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
