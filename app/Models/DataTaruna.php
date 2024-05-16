<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTaruna extends Model
{
    use HasFactory;

    protected $guarded = 'id';
    public function Angkatan()
    {
        return $this->belongsTo(Angkatan::class, 'id_angkatan', 'id');
    }
}
