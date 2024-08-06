<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadPenilaian extends Model
{
    use HasFactory;
    protected $table = 'upload_penilaian';


    public function AngkatanMhs()
    {
        return $this->hasMany(User::class, 'angkatan', 'angkatan');
    }
}
