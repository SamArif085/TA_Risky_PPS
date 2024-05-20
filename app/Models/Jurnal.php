<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;
    protected $table = 'jurnal';

    public function nama()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }
    public function Jenis()
    {
        return $this->belongsTo(JenisJurnal::class, 'id_jenis_jurnal', 'id');
    }
}
