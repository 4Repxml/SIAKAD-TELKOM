<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MataKuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'dosen_id',
        'kode_mk',
        'nama_mk',
        'sks',
        'semester',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}
