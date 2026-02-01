<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    protected $fillable = [
        'nik',
        'nama',
        'email',
        'is_active',
    ];

    public function histories()
    {
        return $this->hasMany(EmployeeHistory::class);
    }

    public function currentHistory()
    {
        return $this->hasOne(EmployeeHistory::class)
            ->where('current_flag', true);
    }
}
