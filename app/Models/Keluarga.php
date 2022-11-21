<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;
    public $table = 'form_keluarga';
    public $fillable = [
        'userid', 'status', 'nama', 'jk', 'usia', 'pendidikan', 'pekerjaan', 'created_at', 'updated_at'
    ];
}
