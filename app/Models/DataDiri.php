<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDiri extends Model
{
    use HasFactory;
    public $table = 'form_data_diri';
    public $fillable = [
        'userid',
        'nama',
        'jk',
        'tempat_lahir',
        'tanggal_lahir',
        'kewarganegaraan',
        'agama',
        'alamat_domisili',
        'alamat_ktp',
        'hp',
        'email',
        'ktp',
        'npwp',
        'perkawinan',
        'created_at',
        'tugas',
        'namaK', 'tempatK', 'tanggalK', 'agamaK', 'pendidikanK', 'pekerjaanK', 'jabatanK',
        'sakit', 'tahun_sakit', 'lama_sakit', 'penyakit', 'rawat',
        'sampingan', 'penjelasan_s', 'dimana_s', 'penjelasan_dimana', 'luar_kota', 'penjelasan_tugas', 'tempat_luar', 'penjelasan_tempat', 'nama_daerah',
        'p_sekarang', 'p_harapkan', 'mulai_kerja', 'referensi',
        'updated_at'
    ];
}
