<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Models\PeminjamanBuku;

class PinjamBukuController extends Controller
{
    public function pinjamBuku($id)
    {
        // dd($id);

        $pinjamBuku = new PeminjamanBuku();
        $pinjamBuku->user_id = auth()->user()->id;
        $pinjamBuku->list_buku_id = $id;
        $pinjamBuku->save();

        return redirect()->back()->with('success', 'Buku berhasil masuk dalam list peminjaman!');
    }

    public function index()
    {
        $roleUser = $this->roleUser()->role->nama_role;

        if ($roleUser == 'Admin') {
            $PeminjamanBuku = PeminjamanBuku::latest()->get();
        } elseif ($roleUser == 'User') {
            $PeminjamanBuku = PeminjamanBuku::where('user_id', auth()->user()->id)->latest()->get();
        }

        return view('peminjaman.index', compact('PeminjamanBuku'));
    }

    public function roleUser()
    {
        $user_role = UserRole::where('user_id', auth()->user()->id)->first();

        return $user_role;
    }
}
