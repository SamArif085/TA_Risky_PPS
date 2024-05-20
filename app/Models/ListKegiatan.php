<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListKegiatan extends Model
{
    use HasFactory;
    protected $table = 'list_kegiatan';

    public function Tahun()
    {
        return $this->belongsTo(TahunKegiatan::class, 'id_tahun_kegiatan', 'id');
    }
    public function Foto()
    {
        return $this->hasMany(GambarKegiatan::class, 'id_list_kegiatan', 'id');
    }
}
