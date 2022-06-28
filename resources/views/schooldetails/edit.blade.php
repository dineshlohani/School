<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">विद्यालय विवरण </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
</div>
<form class="forms-sample" action="{{ route('school-details-update', $row->id) }}" method="post">
  @csrf
  <div class="modal-body">
    <div class="form-group">
    <select name="school_type" class="form-control">
        <option>--Select--</option>
        @foreach($type as $key => $st)
            <option value="{{ $st->id }}" {{$row->school_type == $st->id  ? 'selected' : ''}}>{{ $st->school_type }}</option>
        @endforeach
      </select>
      </span>
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">विद्यालयको नाम<i class="fa fa-asterisk text-danger"></i></label>
      <input type="text" class="form-control" id="school_name" name="school_name" value="{{ $row->school_name }}">
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">विद्यालय स्थापना मिति<i class="fa fa-asterisk text-danger"></i></label>
      <input class="form-control" data-inputmask="'alias': 'date'" name="school_commence_date" placeholder="dd/mm/yyyy" value="{{ $row->school_commence_date }}">
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">विद्यालय रहेको ठेगाना<i class="fa fa-asterisk text-danger"></i></label>
      <input type="text" class="form-control" id="school_address" name="school_address" value="{{ $row->school_address }}">
    </div>
    </div>
  </div>

 <div class="modal-footer">
    <button type="submit" class="btn btn-sm btn-block btn-success"> सेभ गर्नुहोस </button>
  </div>
</form>