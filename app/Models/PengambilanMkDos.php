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
    public function RelasiPengambilanMKMhs()
    {
        return $this->belongsTo(PengambilanMkMhs::class, 'id_pengambilan_mata_kuliah_mhs', 'id');
    }
    public function ModulMateri()
    {
        return $this->hasMany(ModulMateriDosen::class, 'id_pengambilan_mk_dos', 'id');
    }
    public function Semester()
    {
        return $this->belongsTo(Semester::class, 'semester', 'id');
    }
}
