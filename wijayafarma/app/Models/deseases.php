<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deseases extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nama_Penyakit',
        'Deskripsi',
        'Penyakit_img',
        'slug',
    ];
}
