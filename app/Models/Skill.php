<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ClearsPortfolioCache;

class Skill extends Model
{
    use ClearsPortfolioCache;

    protected $fillable = ['category', 'name', 'icon'];
}
