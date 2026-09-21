<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\ClearsPortfolioCache;

class Project extends Model
{
    use HasFactory, ClearsPortfolioCache;

    protected $guarded = [];

    // TAMBAHKAN INI AGAR ARRAY TECH STACK BISA DIBACA
    protected $casts = [
        'tech_stack' => 'array',
        'additional_images' => 'array',
    ];
}