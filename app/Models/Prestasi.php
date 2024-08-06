<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;
    protected $table = 'prestasis';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
