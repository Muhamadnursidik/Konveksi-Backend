<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finishing extends Model
{
    protected $table = 'finishing';

    protected $fillable = [
        'job_produksi_id',
        'user_id',
        'qc_status',
        'status',
        'catatan'
    ];

    public function jobProduksi()
    {
        return $this->belongsTo(JobProduksi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
