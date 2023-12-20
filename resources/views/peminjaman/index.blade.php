@extends('layouts-sb-admin-2.app')
@section('title', 'Peminjaman')

@section('peminjaman-active', 'active')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Peminjaman</h1>

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

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Table Peminjaman</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Peminjam</th>
                        <th>Buku Dipinjam</th>
                        <th>Kode Buku</th>
                        <th>Pengarang</th>
                        <th>Kategori</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Nama Peminjam</th>
                        <th>Buku Dipinjam</th>
                        <th>Kode Buku</th>
                        <th>Pengarang</th>
                        <th>Kategori</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($PeminjamanBuku as $pnjmBuku)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$pnjmBuku->user->name}}</td>
                            <td>{{$pnjmBuku->list_buku->judul_buku}}</td>
                            <td>{{$pnjmBuku->list_buku->kode_buku}}</td>
                            <td>{{$pnjmBuku->list_buku->pengarang}}</td>
                            <td>{{$pnjmBuku->list_buku->kategori->kategori}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection