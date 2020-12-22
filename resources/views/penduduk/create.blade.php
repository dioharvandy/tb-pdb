<div class="form-group row">
    <label for="jorong" class="col-sm-3 col-form-label">No Kartu Keluarga</label>
    <div class="col-sm-12">
      {!! Form::select('kartu_keluarga_id', $kartukeluarga, null, 
      ['class' => 'form-control mdb-select md-form']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="namapenduduk" class="col-sm-3 col-form-label">Nama Penduduk</label>
    <div class="col-sm-12">
      <input name="nama_penduduk" type="text" class="form-control" id="namapenduduk">
    </div>
</div>
<div class="form-group row">
    <label for="nikl" class="col-sm-3 col-form-label">NIK</label>
    <div class="col-sm-12">
      <input name="nik" type="number" min="0" max="9999999999999999" class="form-control" id="nikl">
    </div>
</div>
<div class="form-group row">
    <label for="tempatlahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
    <div class="col-sm-12">
      <input name="tempat_lahir" type="text" class="form-control" id="tempatlahir">
    </div>
</div>
<div class="form-group row">
    <label for="tanggallahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
    <div class="col-sm-12">
      <input name="tanggal_lahir" type="date" class="form-control" id="tanggallahir">
    </div>
</div>
<div class="form-group row">
    <label for="agamal" class="col-sm-3 col-form-label">Agama</label>
    <div class="col-sm-12">
        {!! Form::select('agama', ['hindu'=>'Hindu', 'budha'=>'budha','islam'=>'Islam','kirsten'=>'Kristen','konghucu'=>'Konghucu'], null, 
        ['class' => 'form-control mdb-select md-form']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="jeniskelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
    <div class="col-sm-12">
        {!! Form::select('jenis_kelamin', ['laki-laki'=>'Laki-laki', 'perempuan'=>'Perempuan'], null, 
        ['class' => 'form-control mdb-select md-form']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="levelpendidikan" class="col-sm-3 col-form-label">Level Pendidikan</label>
    <div class="col-sm-12">
      {!! Form::select('level_pendidikan_id', $levelpendidikan, null, 
      ['class' => 'form-control mdb-select md-form']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="pekerjaanl" class="col-sm-3 col-form-label">Pekerjaan</label>
    <div class="col-sm-12">
      {!! Form::select('pekerjaan_id', $pekerjaan, null, 
      ['class' => 'form-control mdb-select md-form']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="statuspernikahan" class="col-sm-3 col-form-label">Status Pernikahan</label>
    <div class="col-sm-12">
        {!! Form::select('status_pernikahan', ['Belum Menikah'=>'Belum Menikah', 'Menikah'=>'Menikah'], null, 
        ['class' => 'form-control mdb-select md-form']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="statuskeluarga" class="col-sm-3 col-form-label">Status Keluarga</label>
    <div class="col-sm-12">
        {!! Form::select('status_keluarga', ['Ayaha'=>'Ayah', 'Ibu'=>'Ibu','Anak'=>'Anak'], null, 
        ['class' => 'form-control mdb-select md-form']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="kewarganegaraanl" class="col-sm-3 col-form-label">Kewarganegaraan</label>
    <div class="col-sm-12">
      {!! Form::select('kewarganegaraan_id', $kewarganegaraan, null, 
      ['class' => 'form-control mdb-select md-form']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="ayahl" class="col-sm-3 col-form-label">Ayah</label>
    <div class="col-sm-12">
      <input name="ayah" type="text" class="form-control" id="ayahl">
    </div>
</div>
<div class="form-group row">
    <label for="ibul" class="col-sm-3 col-form-label">Ibu</label>
    <div class="col-sm-12">
      <input name="ibu" type="text" class="form-control" id="ibul">
    </div>
</div>
<div class="form-group row">
  <div class="col-sm-12">
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>

@section('script')
<script>$('#tanggallahir').datepicker({ dateFormat: 'dd-mm-yy' }).val();</script>
@endsection


