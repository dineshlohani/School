@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{ URL :: to('/dashboard') }}">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>प्रगति विवरण शिर्षक</span></li>
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
        <a class="btn btn-sm btn-dark" href="#frmadd" data-toggle="modal" data-url="{{route('add-modules')}}" data-id=""><i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस</a>
      </div><br>
        <table class="rtable">
          <thead>
            <tr>
              <th>क्र. सं.</th>
              <th>शिर्षक</th>
              <th>#</th>
            </tr>
          </thead>
          <tbody>
            @php $i=1; @endphp
            @if(!empty($data))
            @foreach($data as $key => $title)
            @php $sn = convertedNum($i++)@endphp
            <tr>
              <td>{{ $sn }}</td>
              <td>{{ $title->name }}</td>
              <td>
                <a class="btn btn-sm btn-info" href="#frmedit" data-toggle="modal" data-url="{{route('edit-modules')}}" data-id="{{ $title->id }}">
                  <i class="fa fa-pencil"></i>
                </a>
              </td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
@section('scripts')
<script src="{{asset('assets/js/search.js')}}"></script>        
@endsection
<!-- content-wrapper ends -->
@endsection