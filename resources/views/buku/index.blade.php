@extends('layouts-sb-admin-2.app')
@section('title', 'Buku')

@section('buku-active', 'active')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Buku</h1>

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
        <h6 class="m-0 font-weight-bold text-primary">Table Buku</h6>
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
                    @foreach ($books as $book)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$book->kode_buku}}</td>
                            <td>
                                <img style="height: 100px; width: 80px" src="{{ asset('/storage/'. $book->foto)}}" alt="">
                            </td>
                            <td>{{$book->judul_buku}}</td>
                            <td>{{$book->pengarang}}</td>
                            <td>{{$book->kategori->kategori}}</td>
                            <td>

                                <a href="{{route('pinjamBuku', $book->id)}}" onclick="return confirm('Anda ingin meminjam buku ini?')"
                                    class="btn btn-info btn-sm">
                                    <i class="fas fa-fw fa-plus"></i> Pinjam</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection