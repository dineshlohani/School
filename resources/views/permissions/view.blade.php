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
      <div class="card-header">
        <h3 class="pull-right"></h3>
        प्रयोगकर्ताको अनुमित<br>
        <div class="form-check form-check-success">
          <label class="form-check-label">
          <input name="all-permission" type="checkbox" class="form-check-input precheck" value="1" id="selectall">
          <i class="input-helper"></i> Select All</label>
        </div>
        <div class="form-check form-check-success">
         
        </div>
        <!-- <button type = "button" class="btn btn-sm btn-outline-success" id="selectall">Check All</button> -->
      </div>
      
      <div class="card-body">
        <form class="forms-sample" action="{{ route('assign-userpermission', $user->id) }}" method="post">
          @csrf
          <div class="table-responsive">
            <table class="table table-hover rtable">
              <thead>
                <tr>
                  <th colspan ="3" class="text-center"><b>प्रयोगकर्ताको नाम: {{$user->name}}</b></th>
                </tr>
              </thead>
              <tbody>
                @php $i=1; @endphp
                @if(!empty($data))
                @foreach($data as $key => $title)
                <tr>
                  <td>
                    <div class="form-check form-check-success">
                      <label class="form-check-label">
                        <input name="permissions[]" type="checkbox" class="form-check-input precheck" value="{{ $title->id }}" @php if($user->hasPermissionTo($title->name)){ echo 'checked'; }@endphp>
                      <i class="input-helper"></i></label>
                    </div>
                  </td>
                  <td><b>{{ $title->name }} <i class="fa fa-info-circle"></i> </b></td>
                  <td><a href="{{route('revoke-permission', [$user->id,$title->name])}}" class="btn btn-rounded btn-outline-danger btn-sm"><i class="fa fa-times"></i></a></td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
          <hr>
          <button type="submit" class="btn btn-dark btn-block">सेभ गर्नुहोस</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@yield('scripts')
<script src="{{asset('assets/js/search.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#selectall').click(function() {
      var atLeastOneIsChecked = $('input[name="permissions[]"]').length > 0;
      if($(this).is(':checked')){
          $('.precheck').each(function() { //loop through each checkbox
            this.checked = true;  //select all checkboxes   
          });
      } else {
          $('.precheck').each(function() { //loop through each checkbox
            this.checked = false; //deselect all checkboxes                    
          }); 
      }
    });
  });
</script>
<!-- content-wrapper ends -->
@endsection