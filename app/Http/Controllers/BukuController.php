<?php

namespace App\Http\Controllers;

use App\Models\ListBuku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = ListBuku::orderBy('judul_buku', 'asc')->get();
        return view('buku.index', [
            'books' => $buku
        ]);
    }
}
