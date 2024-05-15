<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $guarded = 'id';
    public function JenisDosen()
    {
        return $this->belongsTo(JenisDosen::class, 'id_jenis_dosen', 'id');
    }
}
