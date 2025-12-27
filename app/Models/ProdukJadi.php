<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukJadi extends Model
{
    protected $table = 'produk_jadi';

    protected $fillable = [
        'job_produksi_id',
        'model_pakaian_id',
        'jumlah',
        'tanggal_selesai'
    ];

    public function jobProduksi()
    {
        return $this->belongsTo(JobProduksi::class);
    }

    public function modelPakaian()
    {
        return $this->belongsTo(ModelPakaian::class);
    }
}
