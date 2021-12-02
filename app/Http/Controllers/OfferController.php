<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{
    public function index()
    {
        return view(
            'offers.index',
            [
                'offers' => Offer::withTrashed()->get()
            ]
            );
    }
    


}