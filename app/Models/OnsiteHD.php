<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnsiteHD extends Model
{
    protected $table = 'onsite_hd';

    protected $fillable = [
        'customer_name',
        'hd_onsite_name',
        'tanggal_mulai_efektif',
        'tanggal_akhir_efektif',
    ];

    protected $casts = [
        'tanggal_mulai_efektif' => 'date',
        'tanggal_akhir_efektif' => 'date',
    ];
}
