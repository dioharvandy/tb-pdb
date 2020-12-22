<div class="form-group row">
    <label for="jorong" class="col-sm-3 col-form-label">Jorong</label>
    <div class="col-sm-12">
      {!! Form::select('jorong_id', $jorong, null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="nokk" class="col-sm-3 col-form-label">No Kartu Keluarga</label>
    <div class="col-sm-12">
      <input name="no" type="number" min="0" max="9999999999" class="form-control" id="nokk">
    </div>
</div>
<div class="form-group row">
    <label for="tanggalpencatatan" class="col-sm-3 col-form-label">Tanggal Pencatatan</label>
    <div class="col-sm-12">
      <input name="tanggal_pencatatan" type="date" class="form-control" id="tanggalpencatatan">
</div>
</div>
  <div class="form-group row">
    <div class="col-sm-12">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

  @section('script')
  <script>$('#tanggalpencatatan').datepicker({ dateFormat: 'dd-mm-yy' }).val();</script>
  @endsection