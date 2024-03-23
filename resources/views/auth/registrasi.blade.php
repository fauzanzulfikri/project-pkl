<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="{{asset('assets/images//logo/logo-2.svg')}}">
                </div>
                <h4>Belum Punya Akun?</h4>
                <h6 class="font-weight-light">Silahkan buat akun terlebih dahulu!</h6>
                <form class="pt-3" action="/register" method="POST">
                    @csrf
                    <div class="form-group">
                      <input type="text" class="form-control form-control-lg" placeholder="Nama" name="nama" value="{{ old('nama') }}">
                      @error('nama')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username" name="username" value="{{ old('username') }}">
                    @error('username')
                      <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password" >
                    @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-block btn-gradient-info btn-lg font-weight-medium auth-form-btn"  style="width: 335px;" >Buat Akun</button>
                  <div class="text-center mt-4 font-weight-light"> Sudah Punya Akun? <a href="/" class="text-primary">Login</a>
                  </div>
                </form>
                
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/js/misc.js')}}"></script>
    <!-- endinject -->
  </body>
</html>