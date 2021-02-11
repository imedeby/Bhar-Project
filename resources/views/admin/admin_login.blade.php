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
  <!-- endinject -->
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="{{ asset('images/backend_images/logo.png') }}" alt="logo">
              </div>
              @if(Session::has('flash_message_error')) 
                <div class="alert alert-danger alert-block">
	                <button type="button" class="close" data-dismiss="alert">×</button>	
                    {!! session('flash_message_error') !!}
                </div>
              @endif  
              @if(Session::has('flash_message_success')) 
                <div class="alert alert-success alert-block">
	                <button type="button" class="close" data-dismiss="alert">×</button>	
                    {!! session('flash_message_success') !!}
                </div>
              @endif
              <form class="pt-3" method="post" action="{{ url('admin') }}"> {{ csrf_field() }}
                <div class="form-group">
                  <label for="exampleInputEmail">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" name="username" id="username" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-lock text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" name="password" id="password" placeholder="Password">                        
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                </div>
                <div class="my-3">
                  <input type="submit" value="LOGIN" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                </div>

            
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('vendors/base/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('js/backend_js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/backend_js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/backend_js/js/template.js') }}"></script>
  <script src="{{ asset('js/backend_js/js/todolist.js') }}"></script>
  <!-- endinject -->
</body>

</html>