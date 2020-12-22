@extends('layouts.app')

@section('kk', 'active')

@section('halaman')
<li class="breadcrumb-item active"> <a href="{{ url('/kartu-keluarga') }}">Kartu Keluarga</a></li>
<li class="breadcrumb-item active">Detail</li>
@endsection

@section('content')
    
<div class="col-lg-12">

    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="m-0">Kartu Keluarga No: <b>{{$kartukeluarga->no}}</b></h5>
      </div>
      <div class="card-body">

        <h6 class="card-title">Tanggal Pencetakan</h6>
        <p class="card-text"><b>{{$kartukeluarga->tanggal_pencatatan}}</b></p>

        <h6 class="card-title">Jorong</h6>
        <p class="card-text"><b>{{$kartukeluarga->jorong->nama_jorong}}</b></p>

        <h6 class="card-title">Nagari</h6>
        <p class="card-text"><b>{{$kartukeluarga->jorong->nagari->nama_nagari}}</b></p>

      </div>
    </div>
  </div>

@endsection