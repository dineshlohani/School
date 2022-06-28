<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">विद्यालयको विवरण</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form class="forms-sample" action="{{ route('school-details-save') }}" method="post">
  @csrf
  <div class="modal-body">
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">विद्यालय किसिम<i
          class="fa fa-asterisk text-danger"></i></label>
      <span>
        <select name="school_type" class="form-control">
          <option>--Select--</option>
          @foreach($type as $key => $type)
          <option value="{{ $type->id }}">{{ $type->school_type }}</option>
          @endforeach
        </select>
      </span>
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">विद्यालयको नाम<i
          class="fa fa-asterisk text-danger"></i></label>
      <input type="text" class="form-control" id="school_name" name="school_name">
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">विद्यालय स्थापना मिति<i
          class="fa fa-asterisk text-danger"></i></label>
      <input class="form-control nepali-datepicker" name="school_commence_date" placeholder="" id="nepali-datepicker"
        value="">
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">विद्यालय रहेको ठेगाना <i
          class="fa fa-asterisk text-danger"></i></label>
      <input type="text" class="form-control" id="school_address" name="school_address">
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-sm btn-block btn-success"> सेभ गर्नुहोस </button>
  </div>
</form>
<script src="{{ asset('assets/nepali-date-picker/js/nepali.datepicker.v3.7.min.js') }}" type="text/javascript"></script>
<script>
$(document).ready(function() {
  /* Initialize Datepicker with options */
  $('#nepali-datepicker').nepaliDatePicker({
    ndpYear: true,
    ndpMonth: true,
  });
});
</script>