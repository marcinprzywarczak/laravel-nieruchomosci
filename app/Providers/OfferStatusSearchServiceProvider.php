<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\OfferStatuses\OfferStatusSearchService;

class OfferStatusSearchServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('OfferStatusSearchService', function() {
            return new OfferStatusSearchService();
        });
    }

    public function boot()
    {
    
    }
}