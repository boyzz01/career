<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanNon extends Model
{
    use HasFactory;
    public $table = 'form_non_formal';
    public $fillable = [
        'userid', 'nama', 'penyelenggara', 'sekolah', 'mulai', 'akhir', 'created_at', 'updated_at'
    ];
}
