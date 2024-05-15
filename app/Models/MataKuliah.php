<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';
    protected $guarded = 'id';

    public function Semester()
    {
        return $this->belongsTo(Semester::class, 'id_semester', 'id');
    }
}
