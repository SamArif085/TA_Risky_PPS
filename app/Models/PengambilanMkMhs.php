<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengambilanMkMhs extends Model
{
    use HasFactory;

    protected $table = 'pengambilan_mata_kuliah_mhs';
    protected $guarded = ['id'];

    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class, 'angkatan', 'angkatan');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'id_semester', 'id');
    }
    public function matkul()
    {
        return $this->hasMany(MataKuliah::class, 'id_semester', 'id_semester');
    }
}
