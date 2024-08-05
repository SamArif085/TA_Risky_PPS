<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengambilanMkDos extends Model
{
    use HasFactory;
    protected $table = 'pengambilan_mata_kuliah_dos';

    public function Dosen()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function KodeMatkul()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_matkul', 'id');
    }
}
