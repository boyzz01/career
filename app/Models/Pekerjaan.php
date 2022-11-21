<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;
    public $table = 'form_pekerjaan';
    public $fillable = [
        'userid', 'nama', 'industri', 'masuk', 'keluar', 'gaji', 'jabatan', 'alasan'
    ];
}
