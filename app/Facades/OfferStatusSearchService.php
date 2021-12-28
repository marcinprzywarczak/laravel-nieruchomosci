<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class OfferStatusSearchService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'OfferStatusSearchService';
    }
}