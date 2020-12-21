@extends('layouts.app')

@section('kk', 'active')

@section('halaman')
<li class="breadcrumb-item active">Kartu Keluarga</li>
@endsection

@section('search')
{!! Form::open(['method' => 'GET', 'url' => '/kartu-keluarga', 'class' => 'form-inline ml-3', 'role' => 'search'])  !!}
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
        <a href="{{ url('/kartu-keluarga/create') }}" class="btn btn-success btn-sm" title="Add New Surat">
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
                            <th>No Kartu Keluarga</th>
                            <th>Nama Jorong</th>
                            <th>Nama Nagari</th>
                            <th>Tanggal Pencatatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kartukeluarga as $index => $item)
                        <tr>
                            <td>{{ $kartukeluarga->firstItem() + $index }}</td>
                            <td>{{ $item->no }}</td>
                            <td>{{ $item->jorong->nama_jorong }}</td>
                            <td>{{ $item->jorong->nagari->nama_nagari }}</td>
                            <td>{{ $item->tanggal_pencatatan }}</td>
                            <td>
                                <a href="{{ url('/kartu-keluarga/' . $item->id ) }}" title="Show Kartu Keluarga">
                                    <button class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Show
                                    </button>
                                </a>
                                <a href="{{ url('/kartu-keluarga/' . $item->id . '/edit') }}" title="Edit Kartu Keluarga">
                                    <button class="btn btn-secondary btn-xs">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </button>
                                </a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['/kartu-keluarga', $item->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-xs',
                                            'title' => 'Delete Kartu Keluarga',
                                            'onclick'=>'return confirm("Confirm delete?")'
                                    )) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $kartukeluarga->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>
            </div>
    </div>
  </div>
@endsection
