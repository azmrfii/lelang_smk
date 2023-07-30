<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';

    protected $fillable = [
        'nama_barang', 'deskripsi', 'harga_awal',
    ];

    public function gambar()
    {
        return $this->hasMany(Gambar::class);
    }
    public function lelang()
    {
        return $this->hasMany(Lelang::class);
    }
}
