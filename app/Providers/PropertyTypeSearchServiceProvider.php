<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PropertyTypes\PropertyTypeSearchService;

class PropertyTypeSearchServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('PropertyTypeSearchService', function() {
            return new PropertyTypeSearchService();
        });
    }

    public function boot()
    {
    
    }
}