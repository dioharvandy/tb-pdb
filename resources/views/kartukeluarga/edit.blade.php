@extends('layouts.app')

@section('kk', 'active')

@section('halaman')
<li class="breadcrumb-item active"> <a href="{{ url('/kartu-keluarga') }}">Kartu Keluarga</a> </li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="m-0">Edit Kartu Keluarga No: <b>{{$kartukeluarga->no}}</b></h5>
      </div>
      <div class="card-body">

    {!! Form::model($kartukeluarga,
        ['method' => 'PATCH',
        'url' => ['/kartu-keluarga',$kartukeluarga->id], 
        'class' => 'form-horizontal',
         'files' => true]) !!}
        
        <div class="form-group row">
            <label for="jorong" class="col-sm-3 col-form-label">Jorong</label>
            <div class="col-sm-12">
              {!! Form::select('jorong_id', $jorong, $kartukeluarga->jorong->nama_jorong, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="nokk" class="col-sm-3 col-form-label">No Kartu Keluarga</label>
            <div class="col-sm-12">
              <input name="no" value="{{$kartukeluarga->no}}" type="number" min="0" max="9999999999" class="form-control" id="nokk">
            </div>
        </div>
        <div class="form-group row">
            <label for="tanggalpencatatan" class="col-sm-3 col-form-label">Tanggal Pencatatan</label>
            <div class="col-sm-12">
              <input name="tanggal_pencatatan"  value="{{$kartukeluarga->tanggal_pencatatan}}" type="date" class="form-control" id="tanggalpencatatan">
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

@section('script')
<script>$('#tanggalpencatatan').datepicker({ dateFormat: 'dd-mm-yy' }).val();</script>
@endsection