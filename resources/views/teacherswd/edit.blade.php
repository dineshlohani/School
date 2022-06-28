@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{ URL :: to('/dashboard') }}">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span><a
              href="{{ URL :: to('/teachers-personal-detail') }}">शिक्षक व्यक्तिगत विवरण</span></li>
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
        <a class="nav-link" id="personal-details"><i class="fa fa-info-circle"></i> शिक्षकको व्यक्तिगत विवरण</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " id="education-details"><i class="fa fa-info-circle"></i> शिक्षकको शैक्षिक विवरण</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" id="work-details"><i class="fa fa-info-circle"></i> शिक्षकको पेशा विवरण सम्पादन</a>
      </li>
    </ul>
    <div class="card">
      <div class="card-header" style="background-color:#041750;color:#fff">शैक्षिक विवरण</div>
      <div class="card-body">
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

        <form id="example-form" action="{{ route('teachers-work-detail-update', $row_data->id) }}" method="post"
          enctype="multipart/form-data">
          @csrf
          <div class="row">
            <input type = "hidden" name="teachers_id" value="{{$row_data->teachers_id}}">
            <div class="col-md-12">
              <table class="table rtable">
                <thead>
                <tr>
                  <th colspan="5" style="padding:10px;"><b>स्थायी शिक्षकको रुपमा कार्यरत विवरण</b></th>
                </tr>
                </thead>
                <tbody>
                  
                  <tr>
                    <td>
                        <label>स्थाई शिक्षक नियुक्ति मिति<i class="fa fa-asterisk" style="color: red;"></i></label>
                        <input type="text" name="perma_enroll_date" class="form-control nepali_date" value ="{{ $row_data->perma_enroll_date}}">
                    </td>
                    
                    <td>
                        <label>नियुक्ति पत्र अपलोड<i class="fa fa-asterisk" style="color: red;"></i></label>
                        <input type="file" name="perma_file_upload" class="form-control"><br>
                        <a href=""> <i class ="fa fa-eye"></i> हेर्नुहोस</a>
                    </td>
                    <td>
                        <label>नियुक्ति पत्रको बिषय<i class="fa fa-asterisk" style="color: red;"></i> </label>
                        <input type="text" name="perma_paper_sub" class="form-control" placeholder="" value ="{{ $row_data->perma_paper_sub}}">
                    </td>
                    
                    <td>
                      <label>सेवा सुरु गरेको मिति<i class="fa fa-asterisk" style="color: red;"></i></label>
                      <input type="text" name="perma_work_start_date" class="form-control nepali_date" value ="{{ $row_data->perma_work_start_date}}">
                    </td>
                  </tr>
                  <tr>  
                    <td>
                      <label>हाल सम्मको सेवा अवधि<i class="fa fa-asterisk" style="color: red;"></i></label>
                      <input type="text" name="perma_work_till_date" class="form-control"placeholder="" value ="{{ $row_data->perma_work_till_date}}">
                    </td>
                    <td>
                      <label>सेवा निवृत हुने मिति<i class="fa fa-asterisk" style="color: red;"></i></label>
                      <input type="text" name="perma_work_last_date" class="form-control nepali_date"
                            placeholder="" value ="{{ $row_data->perma_work_last_date}}">
                    </td>

                    <td>
                        <label>सेवा निवृत हुन बाँकि अवधि <i class="fa fa-asterisk" style="color: red;"></i></label>
                        <input type="text" name="perma_work_last_date_remain" class="form-control" placeholder="" value ="{{ $row_data->perma_work_last_date_remain}}">
                    </td>
                    <td>
                      <label>हाल सम्मको सेवा अवधि<i class="fa fa-asterisk" style="color: red;"></i></label>
                      <input type="text" name="perma_work_till_date" class="form-control" placeholder="" value ="{{ $row_data->perma_work_till_date}}">
                    </td>
                  </tr>
                  <tr><td colspan="4"><b>विद्यालय सम्बन्धि विवरण</b></td></tr>
                  <tr>  
                    <td colspan="4">
                      <label>विद्यालयको नाम<i class="fa fa-asterisk" style="color: red;"></i></label>
                      <input type="text" name="perma_taught_school_name" class="form-control" placeholder="" value ="{{ $row_data->perma_taught_school_name}}">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label>प्रदेश<i class="fa fa-asterisk" style="color: red;"></i></label>
                      <input type="text" name="perma_taught_school_province" class="form-control" placeholder="" value ="{{ $row_data->perma_taught_school_province}}">
                    </td>
                    <td>
                      <label>जिल्ला<i class="fa fa-asterisk" style="color: red;"></i></label>
                      <input type="text" name="perma_taught_school_district" class="form-control" placeholder="" value ="{{ $row_data->perma_taught_school_district}}">
                    </td>

                    <td>
                      <label>स्थानीय तह<i class="fa fa-asterisk" style="color: red;"></i></label>
                      <input type="text" name="perma_taught_school_palika" class="form-control" placeholder="" value ="{{ $row_data->perma_taught_school_local}}">
                    </td>
                    <td>
                      <label>वडा नं<i class="fa fa-asterisk" style="color: red;"></i></label>
                      <input type="text" name="perma_taught_school_ward" class="form-control" placeholder="" value ="{{ $row_data->perma_taught_school_ward}}">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label>नियुक्ति हुदाको पद<i class="fa fa-asterisk" style="color: red;"></i></label>
                      <input type="text" name="perma_enroll_post" class="form-control" placeholder="" value ="{{ $row_data->perma_enroll_post}}">
                    </td>
                    <td>
                      <label>अवधि<i class="fa fa-asterisk" style="color: red;"></i></label>
                      <input type="text" name="perma_enroll_time_period" class="form-control" placeholder="" value ="{{ $row_data->perma_enroll_time_period}}">
                    </td>
                    <td>
                      <label>नियुक्ति पत्र<i class="fa fa-asterisk" style="color: red;"></i></label>
                      <input type="file" name="perma_enroll_paper_upload" class="form-control" placeholder=""><br>
                      <a href=""><i class ="fa fa-eye"></i> हेर्नुहोस</a> 
                    </td>
                    <td>
                      <label>अनुभवको प्रमाण पत्र<i class="fa fa-asterisk" style="color: red;"></i></label>
                      <input type="file" name="perma_experience_letter_upload" class="form-control" placeholder="" ><br>
                      <a href=""> <i class ="fa fa-eye"></i> हेर्नुहोस</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="col-md-12">
              <table class="table rtable">
                <thead>
                <tr>
                  <th colspan="5" style="padding:10px;"><b>अस्थाई शिक्षकको पेशागत विवरण</b></th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <label>अस्थाई शिक्षक नियुक्ति मिति</label>
                      <input type="text" name="tempo_enroll_date" class="form-control nepali_date" value ="{{ $row_data->tempo_enroll_date}}">
                    </td>
                    
                    <td>
                      <label>नियुक्ति पत्र अपलोड</label>
                      <input type="file" name="tempo_file_upload" class="form-control"><br>
                      <a href=""> <i class ="fa fa-eye"></i> हेर्नुहोस</a>
                    </td>
                    <td>
                        <label>कार्यरत अन्तिम मिति </label>
                        <input type="text" name="tempo_last_date" class="form-control nepali_date" value ="{{ $row_data->tempo_last_date}}">
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="col-md-12">
              <table class="table rtable">
                <thead>
                <tr>
                  <th colspan="5" style="padding:10px;"><b>तालिम सम्बन्धि विवरण</b></th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                        <label>तालिम लिएको मिति</label>
                        <input type="text" name="training_took_date" class="form-control nepali_date" value ="{{ $row_data->training_took_date}}">
                    </td>
                    
                    <td>
                      <label>अवधि</label>
                      <input type="text" name="training_period" class="form-control" value ="{{ $row_data->training_period}}">
                    </td>
                    <td>
                      <label>तालिम दिने निकाय</label>
                      <input type="text" name="training_given_org" class="form-control" value ="{{ $row_data->training_given_org}}">
                    </td>
                    <td>
                      <label>तालिम सम्बन्धि कागजात</label>
                      <input type="file" name="training_related_paper_upload" class="form-control"><br>
                      <a href=""><i class="fa fa-eye"></i>हेर्नुहोस</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="col-md-12">
              <hr>
              <button type="submit" class="btn btn-block btn-secondary">सेभ गर्नुहोस</button>
            </div>
          </div>
      </div>
    </div>

</div>
</form>
</div>
</div>
</div>
</div>

<script src="{{ asset('assets/nepali-date-picker/js/nepali.datepicker.v3.7.min.js') }}" type="text/javascript"></script>
<script>
$(document).ready(function() {
  /* Initialize Datepicker with options */
  $('.nepali_date').nepaliDatePicker({
    ndpYear: true,
    ndpMonth: true,
  });
});
</script>
@endsection