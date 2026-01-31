<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jabatan;

class Fungsi extends Model
{
    protected $table = 'fungsis';

    protected $fillable = ['fungsi', 'jabatan_id', 'is_active'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
