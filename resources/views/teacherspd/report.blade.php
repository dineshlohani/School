@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{ URL :: to('/dashboard') }}">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>विद्यालय अनुसार शिक्षकको विवरण</span></span></li>
      </ol>
    </nav>
<form method="post" action="" enctype="multipart/form-data">
<div class="card">
    <div class="card-header">
        <label>बिद्यालय छानुहोस :-</label>
        <label>
        <select name="school_id" id="school_id" class="form-control">
            <option value="0">--छानुहोस--</option>
            @foreach($schoold as $key => $school_name)
                <option value="{{ $school_name->id }}">{{ $school_name->school_name }}</option>
            @endforeach
        </select>
        </label>
    </div>
    <input type="text" id="school_id_name" name="school_name">
    <div class="card-body">
        <table class="rtable">
            <div class="btn btn-secondary" style="width: 100%;"></div>
            <thead>
                <tr>
                    <th>सी.नं</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
</div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('change','#school_id',function(){
            var id = $(this).val();
            $("#school_id_name").val(id);
        });
    });
function newUpdate(data) {
  $(function() {
    $.ajax({
      method: "post",
      url: "welcome/addupdate",
      data: {
        id: data
      },
      success: function(response) {
        alert(response);
      }
    });
  });
}

</script>
@endsection