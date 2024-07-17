<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $table = 'presensi';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function matkul()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_matkul', 'kode');
    }
}
