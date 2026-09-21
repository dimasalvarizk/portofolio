<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ClearsPortfolioCache;

class Experience extends Model
{
    use ClearsPortfolioCache;

    protected $fillable = ['type', 'title', 'subtitle', 'period', 'description'];
}
