<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use App\Models\ListBuku;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countKategori = KategoriBuku::count();
        $countBuku = ListBuku::count();
        $countUsers = User::count();

        ##### Grafik
        $kategori = KategoriBuku::all();

        $dataKategori = [];
        $jmlhBuku = [];
    
        for ($i = 0; $i < count($kategori); $i++) {
            $buku = ListBuku::where('kategori_id', $kategori[$i]->id)->count();
            array_push($dataKategori, $kategori[$i]->kategori);
            array_push($jmlhBuku, $buku);
        }

        $data_kategori = json_encode($dataKategori);
        $jmlh_buku = json_encode($jmlhBuku);
        ########
        
        // dd($jmlh_buku);

        return view('dashboard',[
            'data_kategori' => $data_kategori,
            'jmlh_buku' => $jmlh_buku,
            'countKategori' => $countKategori,
            'countBuku' => $countBuku,
            'countUsers' => $countUsers
        ]);
    }
}
