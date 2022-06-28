@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{ URL :: to('/dashboard') }}">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item" aria-current="page"><span><a
              href="{{ URL :: to('/teachers-personal-list') }}">शिक्षक व्यक्तिगत विवरण</span></li>
        <li class="breadcrumb-item active" aria-current="page"><span>नया थप्नुहोस</span></li>
      </ol>
    </nav>
  </div>
</div>
<div class="row">
  <div class="col-12">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="personal-details" data-toggle="tab" href="#personal-details" role="tab"
          aria-controls="personal-details" aria-selected="true"><i class="fa fa-info-circle"></i> शिक्षकको व्यक्तिगत
          विवरण</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="education-details" data-toggle="tab" href="#education-details" role="tab"
          aria-controls="education-details" aria-selected="true"><i class="fa fa-info-circle"></i> शिक्षकको शैक्षिक
          विवरण</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="work-details" data-toggle="tab" href="#work-details" role="tab"
          aria-controls="work-details" aria-selected="true"><i class="fa fa-info-circle"></i> शिक्षकको कार्य विवरण</a>
      </li>
    </ul>
    <div class="tab-content">

 @if (count($errors) > 0)
                      <div class="row">
                          <div class="col-md-12">
                              <div class="alert alert-danger alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                  @foreach($errors->all() as $error)
                                  {{ $error }} <br>
                                  @endforeach      
                              </div>
                          </div>
                      </div>
                    @endif
      <!-- Teacher personal details tabls -->
      <div class="tab-pane fade active show" id="personal-details" role="tabpanel" aria-labelledby="personal-details">
        <div class="card">
          <div class="card-header" style="background-color:#041750;color:#fff">शिक्षकको व्यक्तिगत विवरण</div>
          <div class="card-body">
            <form id="" action="{{ route('teachers-personal-data-save') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-2">
                  <div class="">
                    <h3>विद्यालय छान्नुहोस्</h3>
                  </div>
                </div>
                <div class="col-md-5">
                  <select name="school_id" class="form-control" required>
                    <option value="">--छान्नुहोस्--</option>
                    @foreach($nameschool as $key => $sn)
                    <option value="{{ $sn->id }}">{{ $sn->school_name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4">
                  <div class="form-group row">
                    <!-- <label class="col-form-label">शिक्षक अवस्था </label> -->
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="teacher_enroll_status" id="teacher_enroll_status" value="1" checked="">
                          स्थाई
                        <i class="input-helper"></i></label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="teacher_enroll_status" id="teacher_enroll_status1" value="2">
                          अस्थाई
                        <i class="input-helper"></i></label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <hr>
                </div>
                <div class="col-md-12 mt-3">
                  <div class="card-title">
                    <div class="alert alert-fill-dark"><i class="fa fa-info-circle"></i>व्यक्तिगत विवरण</div>
                  </div>
                  <hr>
                </div>
                <div class="col-md-3 mb-4">
                  <label>नाम थर (देवनागरि लिपि) <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_name_nep" class="form-control" placeholder="" required>
                </div>
                <div class="col-md-3 mb-4">
                  <label>नाम थर (English) <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_name_eng" class="form-control" placeholder="" required>
                </div>
                <div class="col-md-3 mb-4">
                  <label>जात<i class="fa fa-asterisk" style="color: red;"></i></label>
                  <!-- <input type="text" name="teachers_caste" class="form-control" placeholder=""> -->
                  <select name="teachers_caste" class="form-control" required>
                    <option value="">--छान्नुहोस--</option>
                    @foreach($caste as $key => $c)
                    <option value="{{ $c->name }}">{{ $c->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3 mb-4">
                  <label>धर्म<i class="fa fa-asterisk" style="color: red;"></i> </label>
                  <!-- <input type="text" name="teachers_religion" class="form-control" placeholder=""> -->
                  <select name="teachers_religion" class="form-control" required>
                    <option value="">--छान्नुहोस--</option>
                    @foreach($religion as $key => $r)
                    <option value="{{ $r->name }}">{{ $r->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3 mb-4">
                  <label>लिंग <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <select name="teachers_gender" class="form-control" required>
                    <option value="">--छान्नुहोस--</option>
                    <option value="1">पुरुष</option>
                    <option value="2">महिल</option>
                    <option value="3">अन्य</option>
                  </select>
                </div>
                <div class="col-md-3 mb-4">
                  <label>मोबाइल नं <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_mobno" class="form-control" placeholder="" required>
                </div>
                <div class="col-md-3 mb-4">
                  <label>आधिकारिक इमेल <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_email" class="form-control" placeholder="" required>
                </div>
                <div class="col-md-3 mb-4">
                  <label>जन्मस्थान <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_birth_place" class="form-control" placeholder="" required>
                </div>
                <div class="col-md-3 mb-4">
                  <label>जन्ममिति (BS)<i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_dob_bs" class="form-control" placeholder="" id="dob" required>
                </div>
                <div class="col-md-3 mb-4">
                  <label>जन्ममिति (AD) <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_dob_ad" class="form-control" placeholder="" id="englishdob" required>
                </div>
                <div class="col-md-3 mb-4">
                  <label>बैबाहिक स्थिति <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <select name="teachers_marriage_satatus" class="form-control" required>
                    <option value="">--छानुहोस--</option>
                    <option value="1">विवाहित</option>
                    <option value="2">अविवाहित</option>
                  </select>
                </div>
                <div class="col-md-3 mb-4">
                  <label>विवाहको मिति </label>
                  <input type="text" name="teachers_marriage_date" class="form-control nepali_date" placeholder="">
                </div>
                <div class="col-md-3 mb-4">
                  <label>नागरिकता नं <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_citno" class="form-control" placeholder="" required>
                </div>
                <div class="col-md-3 mb-4">
                  <label>नागरिकता जारि मिति <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_cit_jari_date" class="form-control nepali_date" placeholder="" required>
                </div>
                <div class="col-md-3 mb-4">
                  <label>नागरिकता जारि जिल्ला <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_cit_jari_district" class="form-control" placeholder="" required>
                </div>
                <div class="col-md-3 mb-4">
                  <label>नागरिकता अपलोड <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="file" name="teachers_cit_upload" class="form-control" placeholder="" required>
                </div>

                <div class="col-md-12 mt-3">
                  <hr>
                  <div class="card-title">
                    <div class="alert alert-fill-dark"><i class="fa fa-address-book"></i>ठेगाना</div>
                  </div>
                  <hr>
                </div>

                <div class="col-md-2">
                  <label>प्रदेश <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_province" class="form-control" placeholder="" required>
                </div>
                <div class="col-md-3">
                  <label>जिल्ला <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_zone" class="form-control" placeholder="" required>
                </div>
                <div class="col-md-3">
                  <label>स्थानीय तह <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_localadd" class="form-control" placeholder="" required>
                </div>

                <div class="col-md-2">
                  <label>वडा नं <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_ward" class="form-control" placeholder="" required>
                </div>
                <div class="col-md-2">
                  <label>टोल / गाउँ <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_tole" class="form-control" placeholder="" required>
                </div>
                <div class="col-md-12 mt-3">
                  <hr>
                  <div class="card-title">
                    <div class="alert alert-fill-dark"><i class="fa fa-users"></i> पारिवारिक विवरण</div>
                  </div>
                  <hr>
                </div>
                <div class="col-md-3">
                  <label>बाजेको नाम <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_gf_name" class="form-control" placeholder="" required>
                </div>
                <div class="col-md-3">
                  <label>बुवाको नाम <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_f_name" class="form-control" placeholder="" required>
                </div>
                <div class="col-md-3">
                  <label>आमाको नाम <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_m_name" class="form-control" placeholder="" required>
                </div>
                <div class="col-md-3">
                  <label>पति / पत्नीको नाम </label>
                  <input type="text" name="teachers_hw_name" class="form-control" placeholder="">
                </div>
                <div class="col-md-12 mt-3">
                  <hr>
                  <div class="card-title">
                    <div class="alert alert-fill-dark"><i class="fa fa-certificate"></i> शिक्षक लाइसेन्स विवरण</div>
                  </div>
                  <hr>
                </div>
                <div class="col-md-3">
                  <label>शिक्षक लाइसेन्सको तह <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <select name="teachers_teacher_licensestep" class="form-control" required>
                    <option value="">--छान्नुहोस--</option>
                    @foreach($level as $key => $l)
                    <option value="{{ $l->id }}">{{ $l->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3">
                  <label>शिक्षक लाइसेन्सको बिषय <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_teacher_license_sub" class="form-control" placeholder="" required>
                </div>

                <div class="col-md-3">
                  <label>लाइसेन्स नं जारि मिति <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_teacher_licenseno_jari_date" class="form-control nepali_date"
                    placeholder="" required>
                </div>
                <div class="col-md-3">
                  <label>लाइसेन्स अपलोड <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="file" name="teachers_teacher_license_upload" class="form-control"
                    placeholder="" required>
                </div>
                <div class="col-md-12 mt-3">
                  <hr>
                  <div class="card-title">
                    <div class="alert alert-fill-dark"><i class="fa fa-certificate"></i> स्थाई लेखा पत्र विवरण</div>
                  </div>
                  <hr>
                </div>
                <div class="col-md-4">
                  <label>स्थाई लेखा नं <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_panno" class="form-control" placeholder="" required>
                </div>
                <div class="col-md-4">
                  <label>शिक्षक लाइसेन्स नं <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="text" name="teachers_teacher_licenseno" class="form-control" placeholder="" required>
                </div>
                <div class="col-md-4">
                  <label>स्थाई लेखा अपलोड <i class="fa fa-asterisk" style="color: red;"></i></label>
                  <input type="file" name="teachers_pan_upload" class="form-control" placeholder="" required>
                </div>

                <div class="col-md-12">
                  <hr>
                  <button type="submit" class="btn btn-block btn-secondary">सेभ गर्नुहोस</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('assets/nepali-date-picker/js/nepali.datepicker.v3.7.min.js') }}" type="text/javascript"></script>
<script>
$(document).ready(function() {
  /* Initialize Datepicker with options */
  $('#dob').nepaliDatePicker({
    ndpYear: true,
    ndpMonth: true,

    onChange: function() {

      $.ajax({
        url: "convert-date",
        data: {
          dob: $("#dob").val()
        },
        type: "GET",
        success: function(resp) {
          //console.log(resp);
          $('#englishdob').val(resp);
        },
        error: function() {
          console.log('Internal Server Error!');
        }
      });
    }
  });

  $('.nepali_date').nepaliDatePicker({
    ndpYear: true,
    ndpMonth: true,
  });
});
</script>
@endsection