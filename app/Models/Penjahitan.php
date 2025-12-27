<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjahitan extends Model
{
    protected $table = 'penjahitan';

    protected $fillable = [
        'job_produksi_id',
        'user_id',
        'status',
        'catatan'
    ];

    public function jobProduksi()
    {
        return $this->belongsTo(JobProduksi::class);
    }

    public function penjahit()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
