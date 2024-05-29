<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalenderAkademik extends Model
{
    use HasFactory;
    protected $table = 'kalender_akademik';
    protected $guarded = 'id';
    public function Angkatan()
    {
        return $this->belongsTo(Angkatan::class, 'id_angkatan', 'id');
    }
    public function Semester()
    {
        return $this->belongsTo(Semester::class, 'semester', 'id');
    }
}
