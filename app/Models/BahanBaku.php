<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    protected $table = 'bahan_baku';

    protected $fillable = [
        'nama_bahan',
        'warna',
        'stok_meter',
        'keterangan'
    ];

    public function penggunaanBahan()
    {
        return $this->hasMany(PenggunaanBahan::class);
    }
}
