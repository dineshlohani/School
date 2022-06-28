<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BMS NEPAL</title>

  <link rel="stylesheet" href="{{asset('assets/css/materials_icons.css')}}">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css"> -->

  <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.addons.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/vertical-layout-light/style.css') }}">
  <link rel="shortcut icon" href="{{asset('assets/images/fav.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">

          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018 All
              rights reserved.</p>
          </div>

          <div class="col-lg-6 d-flex align-items-center justify-content-center">

            <div class="auth-form-transparent text-left p-3">
              <div class="text-center">
                <img src="{{ asset('assets/images/new_logo.png') }}" alt="logo">
              </div>
              <br>
              <h4 class="text-center"> {{ !empty(getProfile()->palika) ? getProfile()->palika:''}}</h4>
              <h6 class="font-weight-light text-center">{{ !empty(getProfile()->slogan) ? getProfile()->slogan:''}}, {{ !empty(getProfile()->district) ? getProfile()->district:''}},
                {{!empty(getProfile()->pradesh) ? getProfile()->pradesh:''}}
              </h6>
              <hr>

              @if ($message = Session::get('success'))
              <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
              </div>
              @endif
              <form class="pt-3" method="post" action="{{ URL :: to('/authcheck') }}">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" id="email"
                      placeholder="Username" name="email">

                  </div>
                  @if ($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword"
                      name="password" placeholder="Password">
                  </div>
                  @if ($errors->has('password'))
                  <span class="text-danger">{{ $errors->first('password') }}</span>
                  @endif
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="my-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                    href="{{ URL :: to('/dashboard') }}">LOGIN</button>
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
  <script src="{{asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{asset('vendors/js/vendor.bundle.addons.js') }}"></script>
  <!-- endinject -->

</body>

</html>