<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait ClearsPortfolioCache
{
    /**
     * Boot the trait to add cache clearing events.
     */
    protected static function bootClearsPortfolioCache()
    {
        static::saved(function () {
            Cache::forget('portfolio_data');
            Cache::forget('chatbot_system_context');
        });

        static::deleted(function () {
            Cache::forget('portfolio_data');
            Cache::forget('chatbot_system_context');
        });
    }
}
