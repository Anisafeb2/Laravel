<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'data_barang'; // sesuaikan dengan nama tabel kamu

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'harga_beli',
        'harga_jual',
        'harga_member',
        'grosir1',
        'grosir2',
        'grosir3',
        'user',
    ];
}
