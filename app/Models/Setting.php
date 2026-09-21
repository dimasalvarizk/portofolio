<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ClearsPortfolioCache;

class Setting extends Model
{
    use ClearsPortfolioCache;

    protected $fillable = ['key', 'value'];
}
