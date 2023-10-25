<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListBuku extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'kode_buku',
        'judul_buku',
        'pengarang',
    ];
}
