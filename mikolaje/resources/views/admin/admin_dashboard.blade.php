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

   <!-- core:css -->
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
   <!-- end core:css -->

   <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.css') }}">

    <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
  <!-- endinject -->

  <!-- Layout styles -->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css') }}">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />

@yield('CSSscripts')

@yield('JSscripts')

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

</head>

<body>
  <div class="main-wrapper">

    @include('layouts.inc.admin.sidebar')

    <div class="page-wrapper">

      @include('layouts.inc.admin.navbar')

      @yield('admin')

      @include('layouts.inc.footer')


    </div>

  </div>

  <!-- core:js -->
  <script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
  <!-- endinject -->

  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>


  <!-- Custom Plugin js for this page -->
  <script src="{{ asset('backend/assets/js/dashboard-dark.js') }}"></script>
  <script src="{{ asset('backend/assets/js/form-validation.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>

  <!-- inject:js -->
  <script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/template.js') }}"></script>
  <!-- endinject -->


  @yield('JSscripts')


  <!-- SweetAlert Script -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="{{ asset('backend/assets/js/SweetAlert/code.js') }}"></script>
  <!-- End SweetAlert Script -->



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

</body>
</html>
