<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">शाखाको नाम सम्पादन गर्नुहोस</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
</div>
<form class="forms-sample" action="{{ route('update-role',$row->id) }}" method="post">
  @csrf
  <div class="modal-body">
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">शाखा<i class="fa fa-asterisk text-danger"></i></label>
      <input type="text" class="form-control" id="hame" name="name" value="{{ $row->name }}">
    </div>
  </div>

 <div class="modal-footer">
    <button type="submit" class="btn btn-sm btn-block btn-success"> सेभ गर्नुहोस </button>
    <!-- <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">पछाडी जानुहोस</button> -->
  </div>
</form>