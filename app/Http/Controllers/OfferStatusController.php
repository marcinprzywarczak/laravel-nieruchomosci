<?php

namespace App\Http\Controllers;

use App\Models\OfferStatus;
use Illuminate\Http\Request;
use App\Http\Requests\OfferStatuses\OfferStatusRequest;

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
    public function create()
    {
        return view('offer_statuses.create');
    }

    public function store(OfferStatusRequest $request)
    {
        


        $offer_status = OfferStatus::create(
            $request->all()
        );      
        return redirect()->route('offer_statuses.index')
            ->with('success', __('translations.offer_statuses.flashes.success.stored', [
                'name' =>  $offer_status->name
            ]));
    }
}
