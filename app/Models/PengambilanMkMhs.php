<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengambilanMkMhs extends Model
{
    use HasFactory;
    protected $table = 'pengambilan_mata_kuliah_mhs';

    public function Angkatan()
    {
        return $this->belongsTo(Angkatan::class, 'angkatan', 'id');
    }
}
