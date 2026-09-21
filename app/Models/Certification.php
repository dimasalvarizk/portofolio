<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ClearsPortfolioCache;

class Certification extends Model
{
    use ClearsPortfolioCache;

    protected $fillable = ['name', 'issuer', 'year', 'link', 'icon'];
}
