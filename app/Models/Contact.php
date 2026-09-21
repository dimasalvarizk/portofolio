<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    // Mengizinkan semua kolom diisi (kecuali id dan timestamps)
    protected $guarded = ['id'];
}