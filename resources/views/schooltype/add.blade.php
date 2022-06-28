<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">विद्यालयको किसिम</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
</div>
<form class="forms-sample" action="{{ route('save-school-type') }}" method="post">
  @csrf
  <div class="modal-body">
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">विद्यालय किसिम<i class="fa fa-asterisk text-danger"></i></label>
      <input type="text" class="form-control" id="school_type" name="school_type">
    </div>
  </div>
 <div class="modal-footer">
    <button type="submit" class="btn btn-sm btn-block btn-success"> सेभ गर्नुहोस </button>
  </div>
</form>