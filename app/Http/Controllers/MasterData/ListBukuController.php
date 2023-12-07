<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\KategoriBuku;
use App\Models\ListBuku;
use Illuminate\Http\Request;

class ListBukuController extends Controller
{
    public function index()
    {
        $listBuku = ListBuku::orderBy('judul_buku', 'asc')->get();
        $kategori = KategoriBuku::all();
        return view('master-data.list-buku.index', [
            'listBukus' => $listBuku,
            'kategoris' => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_buku' => 'required|max:5',
            'judul_buku' => 'required',
            'pengarang' => 'required',
            'foto' => 'required|mimes:png,jpg',
            'kategori_id' => 'required'
        ]);

        $listBuku = new ListBuku;
        $listBuku->kode_buku = $request->input('kode_buku');
        $listBuku->judul_buku = $request->judul_buku;
        $listBuku->pengarang = $request->pengarang;

        $listBuku->foto = $request->file('foto')->store('foto', 'public');

        $listBuku->kategori_id = $request->kategori_id;
        $listBuku->save();

        return redirect()->back()->with('success', 'Buku berhasil ditambahkan...');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_buku' => 'required|max:5',
            'judul_buku' => 'required',
            'pengarang' => 'required',
            'foto' => 'required|mimes:png,jpg',
            'kategori_id' => 'required'
        ]);

        $listBuku = ListBuku::find($id);
        $listBuku->kode_buku = $request->input('kode_buku');
        $listBuku->judul_buku = $request->judul_buku;
        $listBuku->pengarang = $request->pengarang;

        $fileL = public_path('/storage/'). $listBuku->foto;
        if (file_exists($fileL)) {
            @unlink($fileL);
        }
        
        $listBuku->foto = $request->file('foto')->store('foto', 'public');

        $listBuku->kategori_id = $request->kategori_id;
        $listBuku->save();

        return redirect()->back()->with('success', 'Buku berhasil di-Update...');
    }

    public function delete($id)
    {
       
        $listBuku = ListBuku::find($id);
        $listBuku->delete();

        return redirect()->back()->with('success', 'Buku berhasil dihapus...');
    }
}
