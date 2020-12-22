@extends('layouts.app')

@section('penduduk', 'active')

@section('halaman')
<li class="breadcrumb-item active"> <a href="{{ url('/penduduk') }}">Penduduk</a> </li>
<li class="breadcrumb-item active"> Edit</li>
@endsection

@section('content')
<div class="col-lg-12">



    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="m-0">Edit Penduduk dengan NIK: <b>{{$penduduk->nik}}</b></h5>
      </div>
      <div class="card-body">

    {!! Form::model($penduduk,
        ['method' => 'PATCH',
        'url' => ['/penduduk',$penduduk->id], 
        'class' => 'form-horizontal',
         'files' => true]) !!}
        
        <div class="form-group row">
            <label for="jorong" class="col-sm-3 col-form-label">No Kartu Keluarga</label>
            <div class="col-sm-12">
              {!! Form::select('kartu_keluarga_id', $kartukeluarga, $penduduk->kartu_keluarga->no, 
              ['class' => 'form-control mdb-select md-form']) !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="namapenduduk" class="col-sm-3 col-form-label">Nama Penduduk</label>
            <div class="col-sm-12">
              <input name="nama_penduduk" value="{{$penduduk->nama_penduduk}}" type="text" class="form-control" id="namapenduduk">
            </div>
        </div>
        <div class="form-group row">
            <label for="nikl" class="col-sm-3 col-form-label">NIK</label>
            <div class="col-sm-12">
              <input name="nik" type="number" value="{{$penduduk->nik}}" min="0" max="9999999999999999" class="form-control" id="nikl">
            </div>
        </div>
        <div class="form-group row">
            <label for="tempatlahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
            <div class="col-sm-12">
              <input name="tempat_lahir" value="{{$penduduk->tempat_lahir}}" type="text" class="form-control" id="tempatlahir">
            </div>
        </div>
        <div class="form-group row">
            <label for="tanggallahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-12">
              <input name="tanggal_lahir" value="{{$penduduk->tanggal_lahir}}" type="date" class="form-control" id="tanggallahir">
            </div>
        </div>
        <div class="form-group row">
            <label for="agamal" class="col-sm-3 col-form-label">Agama</label>
            <div class="col-sm-12">
                {!! Form::select('agama', ['hindu'=>'Hindu', 'budha'=>'Budha','islam'=>'Islam','kirsten'=>'Kristen','konghucu'=>'Konghucu'], $penduduk->agama, 
                ['class' => 'form-control mdb-select md-form']) !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="jeniskelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-12">
                {!! Form::select('jenis_kelamin', ['laki-laki'=>'Laki-laki', 'perempuan'=>'Perempuan'], $penduduk->jenis_kelamin, 
                ['class' => 'form-control mdb-select md-form']) !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="levelpendidikan" class="col-sm-3 col-form-label">Level Pendidikan</label>
            <div class="col-sm-12">
              {!! Form::select('level_pendidikan_id', $levelpendidikan, $penduduk->level_pendidikan->nama_pendidikan, 
              ['class' => 'form-control mdb-select md-form']) !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="pekerjaanl" class="col-sm-3 col-form-label">Pekerjaan</label>
            <div class="col-sm-12">
              {!! Form::select('pekerjaan_id', $pekerjaan, $penduduk->pekerjaan->nama_pekerjaan,
              ['class' => 'form-control mdb-select md-form']) !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="statuspernikahan" class="col-sm-3 col-form-label">Status Pernikahan</label>
            <div class="col-sm-12">
                {!! Form::select('status_pernikahan', ['Belum Menikah'=>'Belum Menikah', 'Menikah'=>'Menikah'], $penduduk->status_pernikahan, 
                ['class' => 'form-control mdb-select md-form']) !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="statuskeluarga" class="col-sm-3 col-form-label">Status Keluarga</label>
            <div class="col-sm-12">
                {!! Form::select('status_keluarga', ['Ayah'=>'Ayah', 'Ibu'=>'Ibu','Anak'=>'Anak'], $penduduk->status_keluarga, 
                ['class' => 'form-control mdb-select md-form']) !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="kewarganegaraanl" class="col-sm-3 col-form-label">Kewarganegaraan</label>
            <div class="col-sm-12">
              {!! Form::select('kewarganegaraan_id', $kewarganegaraan,$penduduk->kewarganegaraan->nama_kewarganegaraan, 
              ['class' => 'form-control mdb-select md-form']) !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="ayahl" class="col-sm-3 col-form-label">Ayah</label>
            <div class="col-sm-12">
              <input name="ayah" value="{{$penduduk->ayah}}" type="text" class="form-control" id="ayahl">
            </div>
        </div>
        <div class="form-group row">
            <label for="ibul" class="col-sm-3 col-form-label">Ibu</label>
            <div class="col-sm-12">
              <input name="ibu" value="{{$penduduk->ibu}}" type="text" class="form-control" id="ibul">
            </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>

    {!! Form::close() !!}  

      </div>
    </div>
  </div>
@endsection