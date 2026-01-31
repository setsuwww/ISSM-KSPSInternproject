<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeHistory extends Model
{
    use HasFactory;

    protected $table = 'employee_history';

    protected $fillable = [
        'employee_id',
        'role_id',
        'location_id',
        'jabatan_id',
        'fungsi_id',
        'tanggal_mulai_efektif',
        'tanggal_akhir_efektif',
        'current_flag',
    ];

    protected $casts = [
        'current_flag' => 'boolean',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
    public function fungsi()
    {
        return $this->belongsTo(Fungsi::class);
    }
}
