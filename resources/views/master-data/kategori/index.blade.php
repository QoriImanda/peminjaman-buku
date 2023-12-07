@extends('layouts-sb-admin-2.app')
@section('title', 'Kategori')
@section('master-data-show', 'show')
@section('kategori-active', 'active')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kategori</h1>

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

    @include('master-data.kategori.create-kategori')
    <div class="m-2">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addKategori">
            Add Kategori
        </button>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Kategori</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($kategoris as $kategori)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kategori->kategori }}</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#editKategori{{ $kategori->id }}">
                                        <i class="fas fa-fw fa-edit"></i> Edit</a>
                                    @include('master-data.kategori.edit-kategori')

                                    <a href="{{route('kategori.delete', $kategori->id)}}" onclick="return confirm('Anda ingin menghapus kategori ini?')"
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
