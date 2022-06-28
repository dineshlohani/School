<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
</div>
<form class="forms-sample" action="{{ route('save-modules') }}" method="post">
  @csrf
  <div class="modal-body">
    <div class="form-group">
      <label for="permission-name" class="col-form-label">नाम<i class="fa fa-asterisk text-danger"></i></label>
      <input type="text" class="form-control" id="permission-name" name="name">
    </div>

  </div>

 <div class="modal-footer">
    <button type="submit" class="btn btn-sm btn-block btn-success"> सेभ गर्नुहोस </button>
  </div>
</form>