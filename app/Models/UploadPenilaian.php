<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadPenilaian extends Model
{
    use HasFactory;
    protected $table = 'upload_penilaian';


    public function AngkatanMhs()
    {
        return $this->hasMany(User::class, 'angkatan', 'angkatan');
    }
    public function Semester()
    {
        return $this->belongsTo(Semester::class, 'semester', 'id');
    }
    public function KodeMatkul()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_matkul', 'kode');
    }
}
