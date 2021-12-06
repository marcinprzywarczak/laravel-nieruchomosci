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

    public function edit(OfferStatus $offer_status)
    {
        $edit = true;
        return view(
            'offer_statuses.create',
            compact('offer_status', ['edit'])
            
        );
    }

    public function update(OfferStatusRequest $request, OfferStatus $offer_status)
    {
        //dd($request->all());
        $offer_status->fill(
            $request->all()
        )->save();
        return redirect()->route('offer_statuses.index')
            ->with(
                'success',
                __($offer_status->wasChanged()
                    ? 'translations.offer_statuses.flashes.success.updated'
                    : 'translations.offer_statuses.flashes.success.nothing-changed',
                    [
                        'name' => $offer_status->name
                    ]
                    )
                    );
    }
}
