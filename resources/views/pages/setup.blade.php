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
      <form class="forms-sample" action="{{ route('update-config') }}" method="post" enctype ="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{!empty($row->id) ? $row->id :''}}">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputUsername1">किसिम</label>
            <select class="form-control" name="type">
              <option value="1">गाउँपालिका</option>
              <option value="2">नगरपालिका</option>
            </select>
          </div>
          @if ($errors->has('type'))
            <span class="text-danger">{{ $errors->first('type') }}</span>
            @endif
         
          @if ($errors->has('slogan'))
            <span class="text-danger">{{ $errors->first('slogan') }}</span>
            @endif
          <div class="form-group">
            <label for="exampleInputPassword1">प्रदेश</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="pradesh" value="{{ !empty($row->pradesh)?$row->pradesh:''}}">
          </div>
          @if ($errors->has('pradesh'))
            <span class="text-danger">{{ $errors->first('pradesh') }}</span>
            @endif
          <div class="form-group">
            <label for="exampleInputConfirmPassword1">जिल्ला</label>
            <input type="text" class="form-control" id="" placeholder="" name="district" value="{{ !empty($row->district)?$row->district:''}}"> 
          </div>
          @if ($errors->has('district'))
            <span class="text-danger">{{ $errors->first('district') }}</span>
            @endif
          <div class="form-group">
            <label for="exampleInputConfirmPassword1">पालिकको नाम</label>
            <input type="text" class="form-control" id="" placeholder="" name="palika" value="{{ !empty($row->palika)?$row->palika:''}}">
          </div>
          @if ($errors->has('district'))
            <span class="text-danger">{{ $errors->first('district') }}</span>
            @endif
          <div class="form-group">
            <label for="exampleInputConfirmPassword1">ठेगाना</label>
            <input type="text" class="form-control" id="" placeholder="" name="address" value="{{ !empty($row->address)?$row->address:''}}">
          </div>
          @if ($errors->has('address'))
            <span class="text-danger">{{ $errors->first('address') }}</span>
            @endif
          <div class="form-group">
            <label for="exampleInputConfirmPassword1">logo</label>
            <input type="file" class="form-control" id="" placeholder="" name="logo" value="{{ !empty($row->logo)?$row->logo:''}}">

            @if(!empty($row->logo))
            <img src="{{ asset('storage/'.$row->logo) }}" style="width:100px">
            @endif
          </div>
          @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('logo') }}</span>
          @endif

          <div class="form-group">
            <label for="exampleInputEmail1">पालिकाको नारा</label>
            <input type="text" class="form-control" id="slogan" placeholder="पालिकाको नारा" name="slogan" value="{{ !empty($row->slogan)?$row->slogan:''}}">
          </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-dark btn-block">सेभ गर्नुहोस</button>
      </form>
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