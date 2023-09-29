<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
  <meta name="author" content="NobleUI">
  <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

  <title>Admin Panel</title>

  <style type="text/css">
    /* width */
    ::-webkit-scrollbar {
    width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
    background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
    background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
    background: #555;
    }
  </style>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

  <!-- Plugin css for this page dla TABEL-->
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendors/responsive/responsive.bootstrap5.min.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.7.0/css/colReorder.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.6.0/css/autoFill.bootstrap5.min.css">
  <!-- dodatki do DataTables-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchbuilder/1.5.0/css/searchBuilder.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.7.0/css/select.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/keytable/2.10.0/css/keyTable.bootstrap5.min.css">
  <!-- -->
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/jquery-tags-input/jquery.tagsinput.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/dropzone/dropzone.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/dropify/dist/dropify.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.css') }}">
  <!-- End plugin css for this page -->

  <!-- core:css -->
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
  <!-- endinject -->

  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
  <!-- endinject -->

  <!-- Layout styles -->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css') }}">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >


</head>

<body>
  <div class="main-wrapper">

    @include('layouts.inc.admin.sidebar')

    <div class="page-wrapper">

      @include('layouts.inc.admin.navbar')

      @yield('admin')

      <!-- partial:partials/_footer.html -->
      <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
      <p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>.</p>
      <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
      </footer>
      <!-- partial -->


    </div>

  </div>

  <!-- core:js -->
  <script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
  <!-- endinject -->

  <!-- Plugin js for this page -->
  <script src="{{ asset('backend/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/select2/select2.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/dropzone/dropzone.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/dropify/dist/dropify.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/moment/moment.min.js') }}"></script>
  <!-- End plugin js for this page -->

  <!-- Custom Plugin js for this page -->
  <script src="{{ asset('backend/assets/js/dashboard-dark.js') }}"></script>
  <script src="{{ asset('backend/assets/js/form-validation.js') }}"></script>
  <script src="{{ asset('backend/assets/js/bootstrap-maxlength.js') }}"></script>
  <script src="{{ asset('backend/assets/js/inputmask.js') }}"></script>
  <script src="{{ asset('backend/assets/js/select2.js') }}"></script>
  <script src="{{ asset('backend/assets/js/typeahead.js') }}"></script>
  <script src="{{ asset('backend/assets/js/tags-input.js') }}"></script>
  <script src="{{ asset('backend/assets/js/dropzone.js') }}"></script>
  <script src="{{ asset('backend/assets/js/dropify.js') }}"></script>
  <script src="{{ asset('backend/assets/js/flatpickr.js') }}"></script>
  <!-- End Custom Plugin js for this page -->


  <!-- inject:js -->
  <script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/template.js') }}"></script>
  <!-- endinject -->

  <!-- SweetAlert Script -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="{{ asset('backend/assets/js/SweetAlert/code.js') }}"></script>
  <!-- End SweetAlert Script -->


  <!-- Start datatable -->
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="{{ asset('backend/assets/vendors/datatables.net/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/datatables.net/jquery.dataTables.min.css') }}"></script>
  <script src="{{ asset('backend/assets/vendors/responsive/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/responsive/responsive.bootstrap5.min.js') }}"></script>
  <!-- dodatki do DataTables-->
  <script src="https://cdn.datatables.net/colreorder/1.7.0/js/dataTables.colReorder.min.js"></script>
  <script src="https://cdn.datatables.net/autofill/2.6.0/js/dataTables.autoFill.min.js"></script>
  <script src="https://cdn.datatables.net/autofill/2.6.0/js/autoFill.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/searchbuilder/1.5.0/js/dataTables.searchBuilder.min.js"></script>
  <script src="https://cdn.datatables.net/searchbuilder/1.5.0/js/searchBuilder.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
  <script src="https://cdn.datatables.net/keytable/2.10.0/js/dataTables.keyTable.min.js"></script>
  <!-- koniec dodatków -->

  <!-- End datatable -->

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
  @if(Session::has('message'))
  var type = "{{ Session::get('alert-type','info') }}"
  switch(type){
      case 'info':
      toastr.info(" {{ Session::get('message') }} ");
      break;

      case 'success':
      toastr.success(" {{ Session::get('message') }} ");
      break;

      case 'warning':
      toastr.warning(" {{ Session::get('message') }} ");
      break;

      case 'error':
      toastr.error(" {{ Session::get('message') }} ");
      break;
  }
  @endif
  </script>

<script>
  // new DataTable('#example', {
  //     order: [[0, 'desc']],
  //     responsive: true,
  //     colReorder: true,
  //     keys: true

  // });
  $(document).ready( function () {
  var table = $('#example').DataTable();
  } );

  $.extend( $.fn.dataTable.defaults, {
    order: [[0, 'desc']],
    responsive: true,
    colReorder: true,
    keys: true
  } );
</script>


</body>
</html>
