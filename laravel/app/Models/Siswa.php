<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
// App\Models\Siswa.php

    protected $fillable = ['nama', 'email', 'tanggal_lahir', 'alamat'];
}


