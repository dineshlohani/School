@extends('layouts.master')
@section('content')
<style>
  .card-header{
    background-color:#041750;
    color:#fff;
  }
</style>
<div class="row">
  <div class="col-lg-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{ URL :: to('/dashboard') }}">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item"><a href="{{ URL :: to('/teachers-personal-detail') }}">विवरण थप गर्नुहोस</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>शिक्षक प्रोफाइल</span></span></li>
      </ol>
    </nav>
  </div>
</div>
    <div class="row">
      <div class="col-12">
        <div class="row gutters-sm">
            <div class="col-md-3 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{ asset('assets/images/avatardefault_92824.png') }}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{ $teacherDetail->teachers_name_nep}}</h4>
                      <p class="text-secondary mb-1">{{$teacherDetail->teachers_tole.'-'.$teacherDetail->teachers_ward}}</p>
                      <p class="text-muted font-size-sm">{{$teacherDetail->teachers_localadd.','.$teacherDetail->teachers_zone}}</p>
                      <p>पान. नं. {{ $teacherDetail->teachers_panno}}</p>
                      <hr>
                        <p>
                          <div class="progress progress-lg mt-2">
                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><a href=""> <i class="fa fa-info-circle"></i> व्यक्तिगत विवरण सुचिमा हेर्नुहोस</a></h6>
                   
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"> <a href="{{route('teachers-education-detail-list', $teacherDetail->id)}}"> <i class="fa fa fa-graduation-cap"></i> शैक्षिक विवरणको सुचिमा हेर्नुहोस </a></h6>
                    
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><a href=" {{route('teachers-work-detail', $teacherDetail->id)}}"> <i class="fa fa-briefcase"></i> पेशागत विवरण </a></h6>
                  
                  </li>
                  
                </ul>
              </div>
            </div>
            <div class="col-md-9">
              <div class="row">
                <div class="col-12">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home-1" role="tab" aria-controls="home-1" aria-selected="true"><i class="fa fa-info-circle"></i> व्यक्तिगत विवरण</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile-1" role="tab" aria-controls="profile-1" aria-selected="false"><i class="fa fa-graduation-cap"></i> शैक्षिक विवरण</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact-1" role="tab" aria-controls="contact-1" aria-selected="false"><i class="fa fa-briefcase"></i> पेशागत विवरण </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="docs-tab" data-toggle="tab" href="#docs-1" role="tab" aria-controls="docs-1" aria-selected="false"><i class="fa fa-folder-open-o"></i> कागजातहरुको विवरण</a>
                    </li>
                  </ul>
                </div>
                @php
                  if($teacherDetail->teacher_enroll_status == 1){
                    $teacher_status = "स्थाई";
                  }else{
                    $teacher_status = "अस्थाई";
                  }
                @endphp
                <!-- tab contents -->
                <div class="col-12">
                  <div class="tab-content">
                    <!-- personal details -->
                    <div class="tab-pane fade show active" id="home-1" role="tabpanel" aria-labelledby="home-tab">
                      <!-- personal details -->
                      <div class="table-responsive">
                        <table class ="rltable">
                          <tr style="background-color:#5294e2;color:#fff"><td colspan ="3"><b>व्यक्तिगत विवरण</b></td></tr>
                          <tr style="background-color:yellow;color:#000"><td colspan ="3"><b>शिक्षकको कार्यअवस्था : {{ $teacher_status }} </b></td></tr>
                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> नाम थर (देवनागरि लिपि): {{ $teacherDetail->teachers_name_nep }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> नाम थर (English): {{ $teacherDetail->teachers_name_eng }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> मोबाइल नं: {{ $teacherDetail->teachers_mobno }}</b></p>
                            </td>
                          
                          </tr>
                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> जन्ममिति:{{ $teacherDetail->teachers_dob_bs }}</b></p>
                            </td>
                            <td> 
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> जन्मस्थान: {{ $teacherDetail->teachers_birth_place }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> बैबाहिक स्थिति: {{ $teacherDetail->teachers_marriage_satatus == 1? 'बिबाहित':'अबिबाहित' }}</b></p>
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> नागरिकता नं: {{ $teacherDetail->teachers_citno }}</b></p>
                            </td>
                            <td> 
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> जारि मिति: {{ $teacherDetail->teachers_cit_jari_date }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> जारि जिल्ला: {{ $teacherDetail->teachers_cit_jari_district }}</b></p>
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> बाजेको नाम: {{ $teacherDetail->teachers_gf_name }}</b></p>
                            </td>
                            <td> 
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> बुवाको नाम: {{ $teacherDetail->teachers_f_name }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> आमाको नाम: {{ $teacherDetail->teachers_m_name }}</b></p>
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> लाइसेन्सको तह: {{ $licenseLevel->name }}</b></p>
                            </td>
                            <td> 
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> लाइसेन्सको बिषय: {{ $teacherDetail->teachers_teacher_license_sub }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> लाइसेन्स नं जारि मिति: {{ $teacherDetail->teachers_teacher_licenseno_jari_date }}</b></p>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <!-- education details -->
                    <div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab">
                      @if(! $educationDetail->isEmpty())
                      @foreach($educationDetail as $key => $edu)
                      <div class="table-responsive">
                        <table class ="rltable">
                          <tr style="background-color:#5294e2;color:#fff"><td colspan ="3"><b>एस एल सि(SLC) विवरण</b></td></tr>
                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> उतिर्ण बर्ष: {{ $edu->slc_passed_year }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> विद्यालयको नाम: {{ $edu->slc_school_name }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> प्रतिशत: {{ $edu->slc_percent }}</b></p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> प्राप्तांक: {{ $edu->slc_pass_marks }}</b></p>
                            </td>
                            <td> 
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> मेजर बिषय: {{ $edu->slc_major_subject}}
                            <td></td>
                          </tr>
                          <!-- plus 2 details -->
                          <tr style="background-color:#5294e2;color:#fff"><td colspan ="3"><b>दश जोड दुइ(१०+२) विवरण</b></td></tr>
                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> उतिर्ण बर्ष: {{ $edu->plustwo_passed_year }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> विद्यालयको नाम: {{ $edu->plustwo_school_name }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> विद्यालयको ठेगाना: {{ $edu->plustwo_school_address }}</b></p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> संकाय(Faculty): {{ $edu->plustwo_faculty }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> प्रतिशत: {{ $edu->plustwo_percentage }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> प्राप्तांक: {{ $edu->plustwo_pass_marks }}</b></p>
                            </td>
                            
                          </tr>
                          <tr style="background-color:#5294e2;color:#fff"><td colspan ="3"><b>स्नातक(Bachelor) विवरण</b></td></tr>
                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> उतिर्ण बर्ष: {{ $edu->bachelor_passed_year }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> विद्यालयको नाम: {{ $edu->bachelor_school_name }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> विद्यालयको ठेगाना: {{ $edu->bachelor_school_address }}</b></p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> संकाय(Faculty): {{ $edu->bachelor_faculty }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> प्रतिशत: {{ $edu->bachelor_percentage }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> प्राप्तांक: {{ $edu->bachelor_pass_marks }}</b></p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> मेजर विषय: {{ $edu->bachelor_major_subject }}</b></p>
                            </td>
                            <td></td>
                            <td></td>
                          </tr>

                          <tr style="background-color:#5294e2;color:#fff"><td colspan ="3"><b>स्नातकोत्तर(Master Degree) विवरण</b></td></tr>
                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> उतिर्ण बर्ष: {{ $edu->masters_passed_year }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> विद्यालयको नाम: {{ $edu->masters_school_name }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> विद्यालयको ठेगाना: {{ $edu->masters_school_address }}</b></p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> संकाय(Faculty): {{ $edu->masters_faculty }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> प्रतिशत: {{ $edu->masters_percentage }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> प्राप्तांक: {{ $edu->masters_pass_marks }}</b></p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> मेजर विषय: {{ $edu->masters_major_subject }}</b></p>
                            </td>
                            <td></td>
                            <td></td>
                          </tr>

                          <tr style="background-color:#5294e2;color:#fff"><td colspan ="3"><b>1 YEAR B.ED विवरण विवरण</b></td></tr>
                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> उतिर्ण बर्ष: {{ $edu->bed_passed_year }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> विद्यालयको नाम: {{ $edu->bed_school_name }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> विद्यालयको ठेगाना: {{ $edu->bed_school_address }}</b></p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> संकाय(Faculty): {{ $edu->bed_faculty }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> प्रतिशत: {{ $edu->bed_percentage }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> प्राप्तांक: {{ $edu->bed_pass_marks }}</b></p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> मेजर विषय: {{ $edu->bed_major_subject }}</b></p>
                            </td>
                            <td></td>
                            <td></td>
                          </tr>
                        </table>
                      </div>
                      @endforeach
                      @else
                      <div class="alert alert-fill-danger">शैक्षिक विवरण दाखिला गरिएको छैन!!! <br><br> <a href="{{ route('teachers-education-create', $teacherDetail->id) }}" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i>विवरण थापनुहोस</a></div>
                      @endif
                    </div>

                    <!-- work details -->
                    <div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab">
                      <div class="col-12">
                        @if(! $workDetail->isEmpty())
                        @foreach($workDetail as $key => $wd)
                        <table class ="rltable">
                          <tr style="background-color:#5294e2;color:#fff"><td colspan ="3"><b>स्थाई शिक्षकको पेशागत विवरण</b></td></tr>
                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> स्थाई शिक्षक नियुक्ति मिति: {{ $wd->perma_enroll_date }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> नियुक्ति पत्रको बिषय: {{ $wd->perma_paper_sub }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> सेवा सुरु गरेको मिति: {{ $wd->perma_work_start_date }}</b></p>
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> हाल सम्मको सेवा अवधि: {{ $wd->perma_work_till_date }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> सेवा निवृत हुने मिति: {{ $wd->perma_work_last_date }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> सेवा निवृत हुन बाँकि अवधि : {{ $wd->perma_work_last_date_remain }}</b></p>
                            </td>
                          </tr>
                          <tr><td colspan= "3">विद्यालय सम्बन्धि विवरण</td></tr>
                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> विद्यालयको नाम: {{ $wd->perma_taught_school_name }}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> ठेगाना: {{ $wd->perma_taught_school_palika }}-{{$wd->perma_taught_school_ward}},{{$wd->perma_taught_school_district}}, {{$wd->perma_taught_school_province}}</b></p>
                            </td>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> नियुक्ति हुदाको पद : {{ $wd->perma_enroll_post }}</b></p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> अवधि: {{ $wd->perma_enroll_time_period }}</b></p>
                            </td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr style="background-color:#5294e2;color:#fff"><td colspan ="3"><b>अस्थाई शिक्षकको पेशागत विवरण</b></td></tr>
                          <tr>
                            <td>
                              <p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> अस्थाई शिक्षक नियुक्ति मिति: {{ $wd->tempo_enroll_date }}</b></p>
                            </td>
                            <td><p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> कार्यरत अन्तिम मिति: {{ $wd->tempo_last_date }}</b></p></td>
                            <td></td>
                          </tr>
                          <tr style="background-color:#5294e2;color:#fff"><td colspan ="3"><b>तालिम सम्बन्धि विवरण</b></td></tr>
                          <tr>
                            <td><p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> तालिम लिएको मिति: {{ $wd->training_took_date }}</b></p></td>
                            <td><p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> अवधि: {{ $wd->training_period }}</b></p></td>
                            <td><p class="badge badge-outline-success badge-pill"><i class="fa fa-hand-o-right"></i><b> तालिम दिने निकाय: {{ $wd->training_given_org }}</b></p></td>
                          </tr>
                        </table>
                        @endforeach
                        @else 
                        <div class="alert alert-fill-danger">शिक्षकको पेशागत विवरण दाखिला गरिएको छैन!!! <br><br> <a href="{{route('teachers-work-detail-create', $teacherDetail->id) }}" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i>पेशागत विवरण थापनुहोस</a></div>
                        @endif
                      </div>
                    </div>

                    <!-- docs details -->
                    <div class="tab-pane fade" id="docs-1" role="tabpanel" aria-labelledby="docs-tab">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">शिक्षकको कागजातहरु</div>
                          <div class="card-body">
                            <table class="rtable">
                              <tr>
                                <td>नागरिता</td>
                                <td>
                                  @if(!empty($teacherDetail->teachers_cit_upload))
                                  <a href="{{asset('storage/'.$teacherDetail->teachers_cit_upload)}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-download"></i> डाउनलोड गर्नुहोस्</a>
                                  @else 
                                 n/a
                                  @endif
                                </td>
                              </tr>
                               <tr>
                                <td>लाइसेन्स</td>
                                <td>
                                  @if(!empty($teacherDetail->teachers_teacher_license_upload))
                                  <a href="{{asset('storage/'.$teacherDetail->teachers_teacher_license_upload)}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-download"></i> डाउनलोड गर्नुहोस्</a>
                                  @else 
                                  n/a
                                  @endif
                                </td>
                              </tr>
                               <tr>
                                <td>स्थाई लेखा</td>
                                <td>
                                  @if(!empty($teacherDetail->teachers_pan_upload))
                                  <a href="{{asset('storage/'.$teacherDetail->teachers_pan_upload)}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-download"></i> डाउनलोड गर्नुहोस्</a>
                                  @else 
                                  n/a
                                  @endif
                                </td>
                              </tr>
                              @if(!empty($educationDetail))
                              @foreach($educationDetail as $key => $edu)
                               <tr>
                                <td>SLC Certificate </td>
                                <td>
                                  @if(!empty($edu->slc_certificate_upload))
                                  <a href="{{asset('storage/'.$edu->slc_certificate_upload)}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-download"></i> डाउनलोड गर्नुहोस्</a>
                                  @else 
                                  n/a
                                  @endif
                                </td>
                              </tr>
                               <tr>
                                <td>SLC Marksheet</td>
                                <td>
                                  @if(!empty($edu->slc_marksheet_upload))
                                  <a href="{{asset('storage/'.$edu->slc_marksheet_upload)}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-download"></i> डाउनलोड गर्नुहोस्</a>
                                  @else 
                                  n/a
                                  @endif
                                </td>
                              </tr>
                               <tr>
                                <td>१०+२ Certificate </td>
                                <td>
                                  @if(!empty($edu->plustwo_certificate_upload))
                                  <a href="{{asset('storage/'.$edu->plustwo_certificate_upload)}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-download"></i> डाउनलोड गर्नुहोस्</a>
                                  @else 
                                  n/a
                                  @endif
                                </td>
                              </tr>
                               <tr>
                                <td>१०+२ Marksheet </td>
                                <td>
                                  @if(!empty($edu->plustwo_marksheet_upload))
                                  <a href="{{asset('storage/'.$edu->plustwo_marksheet_upload)}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-download"></i> डाउनलोड गर्नुहोस्</a>
                                  @else 
                                  n/a
                                  @endif
                                </td>
                              </tr>
                               <tr>
                                <td>१०+२ Transcript </td>
                                <td>
                                  @if(!empty($edu->plustwo_transcript_upload))
                                  <a href="{{asset('storage/'.$edu->plustwo_transcript_upload)}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-download"></i> डाउनलोड गर्नुहोस्</a>
                                  @else 
                                  n/a
                                  @endif
                                </td>
                              </tr>
                              <tr>
                                <td>Bachelor's Certificate </td>
                                <td>
                                  @if(!empty($edu->bachelor_certificate_upload))
                                  <a href="{{asset('storage/'.$edu->bachelor_certificate_upload)}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-download"></i> डाउनलोड गर्नुहोस्</a>
                                  @else 
                                  n/a
                                  @endif
                                </td>
                              </tr>
                              <tr>
                                <td>Bachelor's Marksheet</td>
                                <td>
                                  @if(!empty($edu->bachelor_marksheet_upload))
                                  <a href="{{asset('storage/'.$edu->bachelor_marksheet_upload)}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-download"></i> डाउनलोड गर्नुहोस्</a>
                                  @else 
                                  n/a
                                  @endif
                                </td>
                              </tr>
                              <tr>
                                <td>Bachelor's Transcript</td>
                                <td>
                                  @if(!empty($edu->bachelor_transcript_upload))
                                  <a href="{{asset('storage/'.$edu->bachelor_transcript_upload)}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-download"></i> डाउनलोड गर्नुहोस्</a>
                                  @else 
                                  n/a
                                  @endif
                                </td>
                              </tr>
                              <tr>
                                <td>Master's Certificate </td>
                                <td>
                                  @if(!empty($edu->masters_certificate_upload))
                                  <a href="{{asset('storage/'.$edu->masters_certificate_upload)}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-download"></i> डाउनलोड गर्नुहोस्</a>
                                  @else 
                                  n/a
                                  @endif
                                </td>
                              </tr>
                              <tr>
                                <td>Master's Marksheet </td>
                                <td>
                                  @if(!empty($edu->masters_marksheet_upload))
                                  <a href="{{asset('storage/'.$edu->masters_marksheet_upload)}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-download"></i> डाउनलोड गर्नुहोस्</a>
                                  @else 
                                  n/a
                                  @endif
                                </td>
                              </tr>
                              <tr>
                                <td>Master's Transcript </td>
                                <td>
                                  @if(!empty($edu->masters_transcript_upload))
                                  <a href="{{asset('storage/'.$edu->masters_transcript_upload)}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-download"></i> डाउनलोड गर्नुहोस्</a>
                                  @else 
                                  n/a
                                  @endif
                                </td>
                              </tr>
                              @endforeach
                              @endif
                              @if(!empty($workDetail))
                              @foreach($workDetail as $key => $wd)
                              <tr>
                                <td>नियुक्ति पत्र</td>
                                <td>
                                  @if(!empty($wd->perma_enroll_paper_upload))
                                  <a href="{{asset('storage/'.$wd->perma_enroll_paper_upload)}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-download"></i> डाउनलोड गर्नुहोस्</a>
                                  @else 
                                  n/a
                                  @endif</td>
                              </tr>
                              <tr>
                                <td>अनुभवको प्रमाण पत्र</td>
                                <td>
                                  @if(!empty($wd->perma_experience_letter_upload))
                                  <a href="{{asset('storage/'.$wd->perma_experience_letter_upload)}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-download"></i> डाउनलोड गर्नुहोस्</a>
                                  @else 
                                  n/a
                                  @endif</td>
                              </tr>
                              <tr>
                                <td>तालिम सम्बन्धि कागजात</td>
                                <td>
                                  @if(!empty($wd->training_related_paper_upload))
                                  <a href="{{asset('storage/'.$wd->training_related_paper_upload)}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-download"></i> डाउनलोड गर्नुहोस्</a>
                                  @else 
                                  n/a
                                  @endif</td>
                              </tr>
                              @endforeach
                              @endif
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>
@endsection