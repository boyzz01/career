<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;
    public $table = 'form_anak';
    public $fillable = [
        'userid', 'nama', 'jk', 'lahir', 'kesehatan'
    ];
}