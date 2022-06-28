@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{ URL :: to('/dashboard') }}">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>विद्यालय विवरण</span></span></li>
      </ol>
    </nav>
    <div class="card">

      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif
      <div class="table-responsive">
        <div class="card-title">
          <a class="btn btn-sm btn-dark" href="#frmadd" data-toggle="modal" data-url="{{route('school-tdetails-add')}}" data-id=""><i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस</a>
        </div><br>
        <table class="rtable">
          <thead>
            <tr>
              <th>क्र. सं.</th>
              <th>विद्यालय किसिम</th>
              <th>विद्यालयको नाम</th>
              <th>विद्यालय स्थापना मिति</th>
              <th>विद्यालय रहेको ठेगाना</th>
              <th>सच्याउनुहोस</th>
            </tr>
          </thead>
          <tbody>
            @if (!empty($data))
            @php $i=1; @endphp
            @foreach($data as $key => $title)
            
            <tr>
              <td>{{ convertedNum($i++) }}</td>
              <td>{{ $title->school['school_type'] }}</td>
              <td>{{ $title->school_name }}</td>
              <td>{{ convertedNum($title->school_commence_date) }}</td>
              <td>{{ $title->school_address }}</td>
              <td>
                <a class="btn btn-sm btn-info" href="#frmedit" data-toggle="modal" data-url="{{route('school-details-edit')}}" data-id="{{ $title->id }}">
                  <i class="fa fa-pencil"></i>
                </a>
                <a href="{{route('school-details-delete', $title->id)}}" class="btn btn-sm btn-danger">
                  <i class="fa fa-times"></i>
                </a>
              </td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
        <hr>
        {{ $data->links()}}
      </div>
    </div>
  </div>
</div>
</div>
<!-- content-wrapper ends -->
@endsection