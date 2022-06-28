<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">प्रयोगकर्ताको भूमिका </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
</div>
<form class="forms-sample" action="{{ route('save-roles') }}" method="post">
  @csrf
  <div class="modal-body">
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">भूमिका<i class="fa fa-asterisk text-danger"></i></label>
      <input type="text" class="form-control" id="title" name="name">
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-sm btn-block btn-success"> सेभ गर्नुहोस </button>
  </div>
</form>