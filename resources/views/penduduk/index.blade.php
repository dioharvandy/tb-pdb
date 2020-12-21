@extends('layouts.app')

@section('penduduk', 'active')

@section('halaman')
<li class="breadcrumb-item active">Penduduk</li>
@endsection

@section('search')
{!! Form::open(['method' => 'GET', 'url' => '/penduduk', 'class' => 'form-inline ml-3', 'role' => 'search'])  !!}
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" name="search" value="{{request('search')}}" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
        <a href="{{ url('/penduduk/create') }}" class="btn btn-success btn-sm" title="Add New Surat">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
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
                            <th>Action</th>
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
                                <a href="{{ url('/penduduk/' . $item->id ) }}" title="Show Penduduk">
                                    <button class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Show
                                    </button>
                                </a>
                                <a href="{{ url('/penduduk/' . $item->id . '/edit') }}" title="Edit Penduduk">
                                    <button class="btn btn-secondary btn-xs">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </button>
                                </a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['/penduduk', $item->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-xs',
                                            'title' => 'Delete Penduduk',
                                            'onclick'=>'return confirm("Confirm delete?")'
                                    )) !!}
                                {!! Form::close() !!}
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

@endsection
