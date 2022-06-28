@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-6 col-lg-6 col-xl-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-header" style="background-color:#041750;color:#fff">प्रगति विवरण</div>
        <div class="card-body">
          <table class=" table table-striped">
            <tbody>
            @if(!empty($shakhas))
            @foreach($shakhas as $key => $shakha)
            <tr>
              <td><div class="">
            <img src="{{ asset('assets/images/shakha/krishi/favicon.ico') }}">
           {{ $shakha->name}} </div></td>
              <td>16,08,084</td>
            </tr>
            @endforeach
            @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- ---------- -->
    <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex flex-row flex-wrap">
            <img src="../../../../images/faces/face11.jpg" class="img-lg rounded" alt="profile image">
            <div class="ml-3">
              <h6>Maria</h6>
              <p class="text-muted">maria@gmail.com</p>
              <p class="mt-2 text-success font-weight-bold">Designer</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->
@endsection