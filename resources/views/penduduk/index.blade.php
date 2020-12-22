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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('flash_message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('flash_message') }}</p>
@endif
<div class="card card-primary card-outline">
    <div class="card-header">
        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addmodal" title="Add New">
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
                                    <button class="btn btn-secondary btn-xs">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </a>
                                <a href="{{ url('/penduduk/' . $item->id . '/edit') }}" title="Edit Penduduk">
                                    <button class="btn btn-success btn-xs">
                                        <i class="fa fa-pen" aria-hidden="true"></i>
                                    </button>
                                </a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['/penduduk', $item->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array(
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

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="addmodal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Penduduk</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['method' => 'GET','url' => '/penduduk/create', 
                                'class' => 'form-horizontal', 'files' => true]) !!}

                @include ('penduduk.create')

                {!! Form::close() !!}
            </div>
          </div>
        </div>
    </div>
  </div>

@endsection

@section('script')

<script>
$(document).ready(function() {
$('.mdb-select').materialSelect();
});
</script> 

@endsection
