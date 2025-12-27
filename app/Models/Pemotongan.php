<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemotongan extends Model
{
    protected $table = 'pemotongan';

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

    public function pemotong()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
