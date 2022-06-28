@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{ URL :: to('/dashboard') }}">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>शैक्षिक विवरण सुची</span></span></li>
      </ol>
    </nav>
    <div class="card">
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif
     
      <div class="card-title mb-2">
          
        </div>
     
      <div class="table-responsive">
       
        <table class="rtable">
          <thead>
            <tr>
              <th rowspan="2">क्र.सं</th>
              <th colspan="5" class="text-center">SLC </th>
              <th colspan="6" class="text-center">10+2</th>
              <th colspan="8" class="text-center">Bachelor</th>
              <th colspan="7" class="text-center">Master's</th>
              <th rowspan="2">#</th>
            </tr>
            <tr>
              <!-- slc -->
              <th>उतिर्ण वर्ष</th>
              <th>विद्यालयको नाम</th>
              <th>प्रतिशत</th>
              <th>प्राप्तांक</th>
              <th>मेजर बिषय </th>

              <!-- +2 -->
              <th>उतिर्ण बर्ष</th>
              <th>विद्यालयको नाम</th>
              <th>विद्यालयको ठेगाना</th>
              <th>संकाय(Faculty) </th>
              <th>प्रतिशत(%) </th>
              <th>प्राप्तांक </th>
              <!-- bachelor -->
              <th>उतिर्ण बर्ष</th>
              <th>विद्यालयको नाम</th>
              <th>विद्यालयको ठेगाना</th>
              <th>युनिभर्सिटी</th>
              <th>संकाय(Faculty) </th>
              <th>प्रतिशत(%) </th>
              <th>प्राप्तांक </th>
              <th>मेजर बिषय</th>
              <!-- master's -->
              <th>उतिर्ण बर्ष</th>
              <th>विद्यालयको नाम</th>
              <th>विद्यालयको ठेगाना</th>
              <th>युनिभर्सिटी</th>
              <th>प्रतिशत(%) </th>
              <th>प्राप्तांक </th>
              <th>मेजर बिषय</th>
            </tr>
          </thead>
          <tbody>
            @if(! $data->educationDetails->isEmpty())
            @php $i=1; @endphp
            @foreach($data->educationDetails as $key => $title)
            <tr>
              <td>{{ convertedNum($i++) }}</td>
              <!-- slc -->
              <td>{{ $title->slc_passed_year }}</td>
              <td>{{ $title->slc_school_name }}</td>
              <td>{{ $title->slc_percent}}</td>
              <td>{{ $title->slc_pass_marks }}</td>
              <td>{{ $title->slc_major_subject }}</td>
              <!-- 10+2 -->
              <td>{{ $title->plustwo_passed_year }}</td>
              <td>{{ $title->plustwo_school_name }}</td>
              <td>{{ $title->plustwo_school_address }}</td>
              <td>{{ $title->plustwo_faculty }}</td>
              <td>{{ $title->plustwo_percentage }}</td>
              <td>{{ $title->plustwo_pass_marks }}</td>
              <!-- baheclor -->
              <td>{{ $title->bachelor_passed_year }}</td>
              <td>{{ $title->bachelor_school_name }}</td>
              <td>{{ $title->bachelor_school_address }}</td>
              <td>{{ $title->bachelor_uuniversity_name }}</td>
              <td>{{ $title->bachelor_faculty }}</td>
              <td>{{ $title->bachelor_percentage }}</td>
              <td>{{ $title->bachelor_pass_marks }}</td>
              <td>{{ $title->bachelor_major_subject }}</td>
              <!-- masters -->
              <td>{{ $title->masters_passed_year }}</td>
              <td>{{ $title->masters_school_name }}</td>
              <td>{{ $title->masters_school_address }}</td>
              <td>{{ $title->masters_university_name }}</td>
              <td>{{ $title->masters_percentage }}</td>
              <td>{{ $title->masters_pass_marks }}</td>
              <td>{{ $title->masters_major_subject }}</td>
              <td>
                <a class="btn btn-sm btn-info" href="{{ URL('teachers-education-detail-edit/'.$title->id)}}">
                  <i class="fa fa-pencil"></i>
                </a>
                <a href="{{route('teachers-education-detail-delete', $title->id)}}" class="btn btn-sm btn-danger mt-2">
                  <i class="fa fa-times"></i>
                </a>
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan = "27">
              <div class="alert alert-danger text-center">शैक्षिक विवरण दाखिला गरिएको छैन !!!
                <a class="btn btn-sm btn-dark" href="{{ route('teachers-personal-detail')}}" ><i class="fa fa-plus-circle"></i> शैक्षिक विवरण थप्नुहोस</a>
              </div>
              </td>
            </tr>
            @endif
          </tbody>
        </table>  
       
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- content-wrapper ends -->
@endsection