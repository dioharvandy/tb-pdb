@extends('layouts.app')

@section('penduduk', 'active')

@section('halaman')
<li class="breadcrumb-item active"> <a href="{{ url('/penduduk') }}">Penduduk</a> </li>
<li class="breadcrumb-item active">Detail</li>
@endsection

@section('content')
<div class="col-lg-12">

    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="m-0">No Induk Kependudukan: <b>{{$penduduk->nik}}</b></h5>
      </div>
      <div class="card-body">

        <h6 class="card-title">Nama Penduduk</h6>
        <p class="card-text"><b>{{$penduduk->nama_penduduk}}</b></p>

        <h6 class="card-title">No Kartu Keluarga</h6>
        <p class="card-text"><b>{{$penduduk->kartu_keluarga->no}}</b></p>

        <h6 class="card-title">Tempat Lahir</h6>
        <p class="card-text"><b>{{$penduduk->tempat_lahir}}</b></p>

        <h6 class="card-title">Tanggal Lahir</h6>
        <p class="card-text"><b>{{$penduduk->tanggal_lahir}}</b></p>

        <h6 class="card-title">Jorong</h6>
        <p class="card-text"><b>{{$penduduk->kartu_keluarga->jorong->nama_jorong}}</b></p>

        <h6 class="card-title">Nagari</h6>
        <p class="card-text"><b>{{$penduduk->kartu_keluarga->jorong->nagari->nama_nagari}}</b></p>

        <h6 class="card-title">Agama</h6>
        <p class="card-text"><b>{{$penduduk->agama}}</b></p>

        <h6 class="card-title">Jenis Kelamin</h6>
        <p class="card-text"><b>{{$penduduk->jenis_kelamin}}</b></p>

        <h6 class="card-title">Level Pendidikan</h6>
        <p class="card-text"><b>{{$penduduk->level_pendidikan->nama_pendidikan}}</b></p>

        <h6 class="card-title">Pekerjaan</h6>
        <p class="card-text"><b>{{$penduduk->pekerjaan->nama_pekerjaan}}</b></p>

        <h6 class="card-title">Status Pernikahan</h6>
        <p class="card-text"><b>{{$penduduk->status_pernikahan}}</b></p>

        <h6 class="card-title">Status Keluarga</h6>
        <p class="card-text"><b>{{$penduduk->status_keluarga}}</b></p>

        <h6 class="card-title">Kewarganegaraan</h6>
        <p class="card-text"><b>{{$penduduk->kewarganegaraan->nama_kewarganegaraan}}</b></p>

        <h6 class="card-title">Ayah</h6>
        <p class="card-text"><b>{{$penduduk->ayah}}</b></p>

        <h6 class="card-title">Ibu</h6>
        <p class="card-text"><b>{{$penduduk->ibu}}</b></p>

      </div>
    </div>
  </div>
@endsection