@extends('layouts.app')

@section('laporan', 'active')

@section('halaman')
<li class="breadcrumb-item active">Laporan</li>
@endsection

@section('content')
<div class="col-lg-12">

    <div class="card card-primary card-outline">
      <div class="card-header">
            {!! Form::open(['method' => 'GET', 'url' => '/penduduk/laporan', 'class' => 'form-inline', 'role' => 'search'])  !!}
            <div class="form-group mx-sm-3 mb-2">
                <h4 class="m-3">Penduduk Usia Produktif (14 - 64 Tahun)</h4>
            <input class="form-control" type="search" name="produktif" value="{{request('produktif')}}" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary" type="submit">
                <i class="fas fa-search"></i>
                </button>
            </div>
            {!! Form::close() !!}
      </div>

      <div class="card-body">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Agama</th>
                            <th>Tempat Tinggal</th>
                            <th>Pekerjaan</th>
                            <th>Pendidikan</th>
                            <th>Umur</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($penduduk as $index => $item)
                        <tr>
                            <td>{{ $penduduk->firstItem() + $index }}</td>
                            <td>{{ $item->nama_penduduk }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->agama }}</td>
                            <td>{{ $item->kartu_keluarga->jorong->nama_jorong }}, 
                                {{ $item->kartu_keluarga->jorong->nagari->nama_nagari }}</td>
                            <td>{{ $item->pekerjaan->nama_pekerjaan }}</td>
                            <td>{{ $item->level_pendidikan->nama_pendidikan }}</td>
                            <td>
                                {{\Carbon\Carbon::parse($item->tanggal_lahir)->age}} Tahun
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $penduduk->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>
            </div> 
      </div>
    </div>

    <div class="card card-primary card-outline">
        <div class="card-header">
          {!! Form::open(['method' => 'GET', 'url' => '/penduduk/laporan', 'class' => 'form-inline', 'role' => 'select'])  !!}
          <div class="form-group mx-sm-3 mb-2">
              <h4 class="m-3">Penduduk Pada Nagari</h4>
              {!! Form::select('nagari', $getNagari, null, ['class' => 'form-select']) !!}
          </div>
          <button class="btn btn-primary btn-s" type="submit">Submit</button>
          {!! Form::close() !!}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Agama</th>
                                <th>Tempat Tinggal</th>
                                <th>Pekerjaan</th>
                                <th>Pendidikan</th>
                                <th>Umur</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pendudukNagari as $index => $item)
                            <tr>
                                <td>{{ $pendudukNagari->firstItem() + $index }}</td>
                                <td>{{ $item->nama_penduduk }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->agama }}</td>
                                <td>{{ $item->kartu_keluarga->jorong->nama_jorong }}, 
                                    {{ $item->kartu_keluarga->jorong->nagari->nama_nagari }}</td>
                                <td>{{ $item->pekerjaan->nama_pekerjaan }}</td>
                                <td>{{ $item->level_pendidikan->nama_pendidikan }}</td>
                                <td>
                                    {{\Carbon\Carbon::parse($item->tanggal_lahir)->age}} Tahun
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $pendudukNagari->appends(['nagari' => Request::get('nagari')])->render() !!} </div>
                </div>
                </div> 
          </div>
        </div>
      </div>
      
      <div class="card card-primary card-outline">
        <div class="card-header">
          {!! Form::open(['method' => 'GET', 'url' => '/penduduk/laporan', 'class' => 'form-inline', 'role' => 'select'])  !!}
          <div class="form-group mx-sm-3 mb-2">
              <h4 class="m-3">Penduduk Dibawah SMP pada Nagari</h4>
              {!! Form::select('nagariPendidikan', $getNagari, null, ['class' => 'form-select']) !!}
          </div>
          <button class="btn btn-primary btn-s" type="submit">Submit</button>
          {!! Form::close() !!}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Agama</th>
                                <th>Tempat Tinggal</th>
                                <th>Pekerjaan</th>
                                <th>Pendidikan</th>
                                <th>Umur</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pendudukNagariPendidikan as $index => $item)
                            <tr>
                                <td>{{ $pendudukNagariPendidikan->firstItem() + $index }}</td>
                                <td>{{ $item->nama_penduduk }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->agama }}</td>
                                <td>{{ $item->kartu_keluarga->jorong->nama_jorong }}, 
                                    {{ $item->kartu_keluarga->jorong->nagari->nama_nagari }}</td>
                                <td>{{ $item->pekerjaan->nama_pekerjaan }}</td>
                                <td>{{ $item->level_pendidikan->nama_pendidikan }}</td>
                                <td>
                                    {{\Carbon\Carbon::parse($item->tanggal_lahir)->age}} Tahun
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $pendudukNagariPendidikan->appends(['nagariPendidikan' => Request::get('nagariPendidikan')])->render() !!} </div>
                </div>
                </div> 
          </div>
        </div>
      </div>
  </div>
@endsection