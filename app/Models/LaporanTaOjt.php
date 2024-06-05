<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanTaOjt extends Model
{
    use HasFactory;
    protected $table = 'laporan_ta_ojts';

    public function Angkatan()
    {
        return $this->belongsTo(Angkatan::class, 'angkatan', 'id');
    }
}
