<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {   
        $kategori = KategoriBuku::orderBy('kategori', 'asc')->get();
        return view('master-data.kategori.index',[
            'kategoris' => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $kategori = new KategoriBuku();
        $kategori->kategori = $request->input('kategori');
        $kategori->save();

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriBuku::Find($id);
        $kategori->kategori = $request->input('kategori');
        $kategori->save();

        return redirect()->back()->with('success', 'Data berhasil di-Update!');
    }

    public function delete($id)
    {
        $kategori = KategoriBuku::Find($id);
        $kategori->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
    
}
