@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<div class="page-content">

  <div class="row">
    <div class="col-12 grid-margin">

    </div>
  </div>
  <div class="row profile-body">
    <!-- left wrapper start -->
    <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
      <div class="card rounded">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <div>
              <img class="wd-100 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/images/'.$profileData->photo) : url('upload/images/no_imageAdmin.png') }}" alt="profile">
              <span class="h4 ms-3">{{ $profileData->username }}</span>
            </div>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Imię i Nazwisko:</label>
            <p class="text-muted">{{ $profileData->firstname }} {{ $profileData->lastname }}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Nazwa Firmy:</label>
            <p class="text-muted">{{ $profileData->company_name }}</p>
            <label class="tx-11 fw-bolder mb-0 text-uppercase">NIP:</label>
            <p class="text-muted">{{ $profileData->NIP }}</p>
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Adres:</label>
            <p class="text-muted">{{ $profileData->street_address }} {{ $profileData->street_number }}/ {{ $profileData->flat_number }} </p>
            <p class="text-muted">{{ $profileData->zipcode }} {{ $profileData->city }}</p>
            <p class="text-muted">{{ $profileData->voivodeship }}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Telefon</label>
            <p class="text-muted">{{ $profileData->phone_number }}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
            <p class="text-muted">{{ $profileData->email }}</p>
          </div>
          <div class="mt-3 d-flex social-links">
            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
              <i data-feather="github"></i>
            </a>
            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
              <i data-feather="twitter"></i>
            </a>
            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
              <i data-feather="instagram"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- left wrapper end -->
    <!-- middle wrapper start -->
    <div class="col-md-8 col-xl-8 middle-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="card rounded">
            <div class="card-header">
              <h4>Aktualizacja profilu</h4>
            </div>
            <div class="card-body">
              <h6 class="card-title">Uzupełnij swoje dane</h6>
              <form method="post" action="{{ route('admin.profile.store') }}"
              class="forms-sample" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputUsername1" class="form-label">Imię</label>
                  <input type="text" name= "firstname" class="form-control" id="exampleInputUsername1" autocomplete="off" required value="{{ $profileData->firstname }}">
                  <label for="exampleInputUsername1" class="form-label">Nazwisko</label>
                  <input type="text" name= "lastname" class="form-control" id="exampleInputUsername1" autocomplete="off" required value="{{ $profileData->lastname }}">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Adres Email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" required value="{{ $profileData->email }}">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Telefon</label>
                  <input type="text" name="phone_number" class="form-control" id="exampleInputEmail1" required value="{{ $profileData->phone_number }}">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nazwa firmy:</label>
                  <input type="text" name="company_name" class="form-control" id="exampleInputEmail1" required value="{{ $profileData->company_name }}">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">NIP</label>
                  <input type="text" name="NIP" class="form-control" id="exampleInputEmail1" required value="{{ $profileData->NIP }}">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Ulica</label>
                  <input type="text" name="street_address" class="form-control" id="exampleInputEmail1" required value="{{ $profileData->street_address }}">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nr domu</label>
                  <input type="text" name="street_number" class="form-control" id="exampleInputEmail1" required value="{{ $profileData->street_number }}">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nr lok.</label>
                  <input type="text" name="flat_number" class="form-control" id="exampleInputEmail1" required value="{{ $profileData->flat_number }}">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Kod pocztowy</label>
                  <input type="text" name="zipcode" class="form-control" id="exampleInputEmail1" required value="{{ $profileData->zipcode }}">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Miejscowość</label>
                  <input type="text" name="city" class="form-control" id="exampleInputEmail1" required value="{{ $profileData->city }}">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Województwo</label>
                  <input type="text" name="voivodeship" class="form-control" id="exampleInputEmail1" required value="{{ $profileData->voivodeship }}">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Zdjęcie profilowe</label>
                  <input class="form-control" name="photo" type="file" id="image">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label"></label>
                  <img id="showImage" class="wd-80 rounded-circle"
                  src="{{ (!empty($profileData->photo))
                  ? url('upload/images/'.$profileData->photo)
                  : url('upload/images/no_imageAdmin.png') }}"
                  alt="profile">
                </div>
                <button type="submit" class="btn btn-primary me-2">Zapisz zmiany</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- middle wrapper end -->

  </div>

</div>

<script type='text/javascript'>
  $(document).ready(function() {
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#showImage').attr('src', e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>

@endsection
