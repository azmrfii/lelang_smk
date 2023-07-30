<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_masyarakat', 'id_lelang', 'tgl_penawaran', 'harga_penawaran',
    ];

    protected function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'id_masyarakat');
    }

    protected function lelang()
    {
        return $this->belongsTo(Lelang::class, 'id_lelang');
    }
}
