<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Properties\PropertySearchService;

class PropertySearchServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('PropertySearchService', function() {
            return new PropertySearchService();
        });
    }

    public function boot()
    {
    
    }
}