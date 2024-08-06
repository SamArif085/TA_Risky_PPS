<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulMateriDosen extends Model
{
    use HasFactory;
    protected $table = 'modul_materi_dosens';


    public function KodeMatkulDosen()
    {
        return $this->belongsTo(MataKuliah::class, 'kode', 'kode_matkul');
    }
    public function pengambilan_mata_kuliah_mhs()
    {
        return $this->belongsTo(PengambilanMkMhs::class, 'id', 'id_pengambilan_mata_kuliah_mhs');
    }
}
