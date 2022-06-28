
<form class="forms-sample" action="{{ route('save-import-details') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="modal-body">
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Select xlsx To Import<i class="fa fa-asterisk text-danger"></i></label>
      <input type="file" class="form-control" id="file" name="file">
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-sm btn-block btn-success"> सेभ गर्नुहोस </button>
  </div>
</form>