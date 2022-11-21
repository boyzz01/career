<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    public $table = 'form_pendidikan';
    public $fillable = [
        'userid',
        'nama',
        'tingkat',
        'jurusan',
        'sekolah',
        'kota',
        'masuk',
        'lulus',
        'created_at',
        'updated_at',
        'akademi'
    ];
}
