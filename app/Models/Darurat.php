<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Darurat extends Model
{
    use HasFactory;
    public $table = 'form_darurat';
    public $fillable = [
        'userid', 'nama', 'hp',  'hubungan'
    ];
}
