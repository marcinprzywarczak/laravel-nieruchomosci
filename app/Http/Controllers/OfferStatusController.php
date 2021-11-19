<?php

namespace App\Http\Controllers;

use App\Models\OfferStatus;
use Illuminate\Http\Request;

class OfferStatusController extends Controller
{
    public function index()
    {
        return view(
            'offer_statuses.index',
            [
                'offer_statuses' => OfferStatus::withTrashed()
                    ->withCount('offers')->get()
            ]
            );
    }
}
