<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    use HasFactory;

    protected $table = 'gambars';

    protected $fillable = [
        'id_barang', 'gambar', 'nama_barang', 'utama', 'urutan'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
    public function lelang()
    {
        return $this->hasMany(Lelang::class);
    }
}
