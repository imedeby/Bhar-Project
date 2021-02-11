<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Afrah Bhar Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/base/vendor.bundle.base.css') }}">
  
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/backend_css/style.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <!-- endinject -->
 
</head>
<body>
  <div class="container-scroller">
    @include('layouts.adminLayout.admin_header')
    <div class="container-fluid page-body-wrapper">
    @include('layouts.adminLayout.admin_sidebar')
      <div class="main-panel">
        @yield('content')
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('vendors/base/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('js/backend_js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/backend_js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/backend_js/template.js') }}"></script>
  <script src="{{ asset('js/backend_js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('js/backend_js/dashboard.js') }}"></script>
 
  <!-- End custom js for this page-->
</body>

</html>
