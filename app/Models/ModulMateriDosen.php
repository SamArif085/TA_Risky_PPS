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
}
