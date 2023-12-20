@extends('layouts-sb-admin-2.app')
@section('title', 'List Buku')
@section('master-data-show', 'show')
@section('list-buku-active', 'active')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Buku</h1>

    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" arial-label="close">
                <span aria-hidden="true">x</span>
            </button>
            <h6><i class="fas fa-check"></i><b>Success!</b></h6>
            {{ session('success') }}!
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" arial-label="close">
                <span aria-hidden="true">x</span>
            </button>
            @foreach ($errors->all() as $error)
                <h6><i class="fas fa-check"></i><b> {{ $error }}!</b></h6>
            @endforeach
        </div>
    @endif

    @include('master-data.list-buku.create-listBuku')
    <div class="m-2">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addListBuku">
            <i class="fas fa-fw fa-plus"></i> Add Buku
        </button>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table List Buku</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($listBukus as $listBuku)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$listBuku->kode_buku}}</td>
                                <td>
                                    <img style="height: 100px; width: 80px" src="{{ asset('/storage/'. $listBuku->foto)}}" alt="Gambar">
                                </td>
                                <td>{{$listBuku->judul_buku}}</td>
                                <td>{{$listBuku->pengarang}}</td>
                                <td>{{$listBuku->kategori->kategori}}</td>
                                <td>
                                    @include('master-data.list-buku.edit-listBuku')
                                    <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editListBuku{{$listBuku->id}}">
                                        <i class="fas fa-fw fa-edit"></i> Edit</a>

                                    <a href="{{route('listBuku.delete', $listBuku->id)}}" onclick="return confirm('Anda ingin menghapus user ini?')"
                                        class="btn btn-danger btn-sm">
                                        <i class="fas fa-fw fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
