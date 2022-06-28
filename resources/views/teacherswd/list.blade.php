@extends('layouts.master')
@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{ URL :: to('/dashboard') }}">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>शिक्षक पेशागत विवरण</span></span></li>
      </ol>
    </nav>
    <div class="card">
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif

      <div class = "table-responsive">
      <table class="rtable">
          <thead>
           
            <tr>
              <th rowspan="2">क्र.सं</th>
              <th colspan="7" class="text-center">स्थाई शिक्षकको पेशागत विवरण </th>
              <th colspan="3" class="text-center">अस्थाई शिक्षकको पेशागत विवरण</th>
              <th colspan="3" class="text-center">तालिम सम्बन्धि विवरण</th>
              <th rowspan="2">#</th>
            </tr>
            <tr>
              <th>स्थाई शिक्षक नियुक्ति मिति</th>
              <th>नियुक्ति पत्रको बिषय</th>
              <th>सेवा सुरु गरेको मिति</th>
              <th>सेवा निवृत हुने मिति</th>
              <th>सेवा निवृत हुन बाँकि अवधि</th>
              <th>विद्यालयको नाम</th> 
              <th>नियुक्ति हुदाको पद</th>
              <th>अस्थाई शिक्षक नियुक्ति मिति</th>
              <th>अस्थाई नियुक्ति पत्र</th>
              <th>कार्यरत अन्तिम मिति</th>
              <th>तालिम लिएको मिति</th>
              <th>अवधि</th>
              <th>तालिम दिने निकाय</th>
            </tr>
          </thead>
          <tbody>
            @if (!empty($workDetails))
            @php $i=1; @endphp
            @foreach($workDetails as $key => $title)
            <tr>
              <td>{{ convertedNum($i++) }}</td>
              <td>{{ convertedNum($title->perma_enroll_date) }}</td>
              <td>{{ $title->perma_paper_sub }}</td>
              <td>{{ convertedNum($title->perma_work_start_date) }}</td>
              <td>{{ convertedNum($title->perma_work_last_date) }}</td>
              <td>{{ convertedNum($title->perma_work_last_date_remain) }}</td>
              <td>{{ $title->perma_taught_school_name }}</td>
              <td>{{ $title->perma_enroll_post }}</td>
              <td>{{ convertedNum($title->perma_enroll_time_period) }}</td>

              <td>{{ convertedNum($title->tempo_enroll_date) }}</td>
              <td>{{ convertedNum($title->tempo_last_date) }}</td>

              <td>{{ convertedNum($title->training_took_date) }}</td>
              <td>{{ convertedNum($title->training_period) }}</td>
              <td>{{ $title->training_given_org }}</td>
              <td>
                <a class="btn btn-sm btn-info" href="{{ URL('teachers-work-detail-edit/'.$title->id)}}">
                  <i class="fa fa-pencil"></i>
                </a>
                <!-- <a href="{{route('teachers-education-detail-delete', $title->id)}}" class="btn btn-sm btn-danger">
                  <i class="fa fa-times"></i>
                </a> -->
              </td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
      
      </div>
    </div>
@yield('script')
<script type="text/javascript">
$(document).ready(function(){
    $("#first").hide();
    $("#second").hide();
    $("#type_name").change(function(){
        var type_name = $(this).val()
        if(type_name == 1){
            $("#first").show();
            $("#second").hide();
        }else{
            $("#second").show();
            $("#first").hide();
        }
    });
});
</script>
@endsection