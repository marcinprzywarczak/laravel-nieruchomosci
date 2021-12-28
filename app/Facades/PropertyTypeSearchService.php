<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class PropertyTypeSearchService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PropertyTypeSearchService';
    }
}