<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referensi extends Model
{
    use HasFactory;
    public $table = 'form_referensi';
    public $fillable = [
        'userid', 'nama', 'hp', 'pekerjaan', 'kenal', 'hubungan'
    ];
}
