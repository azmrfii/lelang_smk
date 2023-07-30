<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    use HasFactory;

    protected $table = 'lelangs';

    protected $fillable = [
        'id_barang', 'tgl_mulai', 'tgl_akhir', 'harga_awal', 'status', 'created_by', 'id_masyarakat', 'harga_akhir', 'confirm_date',
    ];
    
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'id_masyarakat');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function penawaran()
    {
        return $this->hasMany(Penawaran::class);
    }
}
