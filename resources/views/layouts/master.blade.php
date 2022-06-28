<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>BMS NEPAL</title>
  <link rel="stylesheet" href="{{asset('assets/css/materials_icons.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('assets/css/vertical-layout-light/style.css') }}">

  <link rel="shortcut icon" href="{{asset('assets/images/fav.png') }}" />

  <link href="{{asset('assets/nepali-date-picker/css/nepali.datepicker.v3.7.min.css') }}" rel="stylesheet"
    type="text/css" />
  <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>


</head>

<body class="sidebar-fixed">
  <!-- <div id="loader" class="lds-dual-ring overlay"></div> -->
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      @include('layouts.header')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-3">
              <img src="{{ asset('assets/images/new_logo.png') }}" style="width:119px; height:100px;">
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 text-center">
              <h3 class="text-center" style="margin-left:151px;">
                {{ !empty(getProfile()->palika) ? getProfile()->palika:'' }}</h3>
              <h6 style="margin-left: 152px; margin-top:10px;">
                {{ !empty(getProfile()->type)? getProfile()->type == 1 ? 'गाउँकार्यपालिकाको कार्यालय' : 'नगरकार्यपालिकाको कार्यालय':''}}
              </h6>
              <p style="margin-left: 159px; margin-top:10px;"> {{ !empty(getProfile()) ? getProfile()->address:'' }},
                {{ !empty(getProfile()->district)?getProfile()->district :'' .','. !empty(getProfile()->pradesh)?getProfile()->pradesh:'' }}
              </p>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
              @if(!empty(getProfile()->logo))
              <img src="{{ asset('storage/'.getProfile()->logo) }}"
                style="margin-left: 400px;width:119px; height:100px;">
              @endif
            </div>

          </div>
          <hr>
          @yield('content')
        </div>

      </div>
    </div>
  </div>


  <div class="modal fade" id="frmadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      </div>
    </div>
  </div>

  <div class="modal fade" id="frmedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      </div>
    </div>
  </div>


</body>
<script src="{{ asset('assets/js/modal.js') }}"></script>
<script src="{{ asset('assets/js/dropdown.js') }}"></script>

</html>