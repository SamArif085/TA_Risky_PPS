<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiTaruna extends Model
{
    use HasFactory;

    protected $guarded = 'id';
    public function MasterAkademik()
    {
        return $this->belongsTo(MasterAkademik::class, 'id_master_akademik', 'id');
    }
}
