@extends('layouts.master')
@section('content')

<div class="row">
  <div class="col-lg-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{ URL :: to('/dashboard') }}">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item"><a href="{{ URL :: to('/teachers-personal-detail') }}">विवरण थप गर्नुहोस</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>शिक्षक विवरण</span></span></li>
      </ol>
    </nav>
    <div class="card">
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif
        <div class="card-title mb-2">
          <a class="btn btn-sm btn-dark" href="{{ route('teachers-personal-detail')}}" ><i class="fa fa-plus-circle"></i> नयाँ शिक्षकको अभिलेख थप्नुहोस</a>
          <a class="btn btn-sm btn-success" href="#frmadd" data-toggle="modal" data-url="{{route('import-teacher-details')}}"
            data-id=""><i class="fa fa-file-excel-o"></i> Import</a>
        </div>
        <hr>
        <form action="{{ route('teacher-search') }}" method="post" class="search-form">
        @csrf
          <div class="row">
            <div class="col-md-2">
              <select name="schoolID" class="form-control select2" id="">
                <option value="">विद्यालय  छानुहोस</option>
                @if(!empty($schools))
                @foreach($schools as $key => $school)
                <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                @endforeach
                @endif
              </select>
            </div>

            <!-- Sthai Asthai Search For Teacher List -->
            <div class="col-md-2">
              <select name="statusID" class="form-control select2" id="">
                <option value="">शिक्षकको अवस्था</option>
                <option value="1">स्थाई</option>
                <option value="2">अस्थाई</option>
              </select>
            </div>

            <div class="col-md-2">
              <input type="text" name="name" class="form-control" placeholder="नाम">
            </div>
            <div class="col-md-2">
              <input type="text" name="licenceNo" class="form-control" placeholder="लाइसेन्स नं">
            </div>
            <div class="col-md-2"><button type="submit" class="btn btn-danger btn-sm mt-1 search-btn" id="search-btn"><i class="fa fa-search"></i> खोज्नुहोस</button>
            </div>
            <div class="col-md-2" id="print">
              <a href="{{ route('teacherpd-prints')}}" class="btn btn-primary btn-sm mt-1"><i class="fa fa-print"> Print</i></a>
              <a href="{{route('teachers-details-export')}}" class="btn btn-warning btn-sm mt-1"><i class="fa fa-file-excel-o" aria-hidden="true"> Excel</i></a>
            </div>
          </div>
        </form>
        <hr>
        <div class="details">
          <table class="rtable">
            <thead>
              <tr>
                <th>क्र. सं.</th>
                <th>नाम थर</th>
                <th>कार्यरत विधालय</th>
                <th>लाइसेन्स नं  </th>
                <th>स्थाई लेखा नं </th>
                <th>सम्पर्क नं. </th>
                <th>शिक्षकको अवस्था </th>
                <th>#</th> 
              </tr>
            </thead>
            <tbody>
              @if (!empty($data))
              @php $i=1; @endphp
              @foreach($data as $key => $title)
              <tr>
                <td>{{ convertedNum($i++) }}</td>
                <td>{{ $title->teachers_name_nep}}</td>
                <td>{{ $title->school->school_name }}</td>

                <td>{{ convertedNum($title->teachers_teacher_licenseno) }}</td>
                <td>{{ convertedNum($title->teachers_panno) }}</td>
                <td>{{ convertedNum($title->teachers_mobno)}}</td>
                <td><p class="btn btn-{{  $title->teacher_enroll_status == 1 ? 'success' : 'danger' }} btn-rounded btn-fw btn-sm">{{  $title->teacher_enroll_status == 1 ? 'स्थाई' : 'अस्थाई' }}</p></td>
                <td>
                  <a class="btn btn-sm btn-info btn-rounded" href="{{ URL('teachers-personal-detail-edit',$title->id)}}">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <a class="btn btn-sm btn-secondary btn-rounded" href="{{ URL('teachers-profile-detail',$title->id)}}">
                    <i class="fa fa-eye"></i>
                  </a>
                </td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
          <hr style="background-color:brown">
          <!-- pagination -->
          <div class="row">
            <div class="col-md-4 mt-2"><p>Showing {{($data->currentpage()-1)*$data->perpage()+1}} to {{$data->currentpage()*$data->perpage()}} of  {{$data->total()}} entries</p>
              </div>
            <div class="col-md-8">{{ $data->withQueryString()->links()}}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
@yield('script')
<script src="{{ asset('assets/js/search.js') }}"></script>
<script>
  $(document).ready(function(){
    $(document).on("click",'#search-btn',function(){
      $("#print").hide();
    });
  });
</script>
<!-- content-wrapper ends -->
@endsection

