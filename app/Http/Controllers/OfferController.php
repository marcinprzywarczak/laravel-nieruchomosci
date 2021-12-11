<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Property;
use App\Models\OfferStatus;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Offers\OfferRequest;

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
    public function create()
    {
        return view('offers.create', 
        [
            'offer_statuses' => OfferStatus::orderBy('name')->get(),
            'properties' => Property::orderBy('id')->get()
        ]);
    }

    public function create_offer(Property $property)
    {
        return view(
            'offers.create',
            [
                'offer_statuses' => OfferStatus::orderBy('name')->get(),
                'property' => $property
            ]
            );
    }

    public function store_offer(OfferRequest $request, Property $property)
    {
        $offers = Offer::where('property_id', $property->id);
        $offer = DB::transaction(function () use($request, $offers) {
            $offers->delete();
            $offer = Offer::create(
                $request->all()
            );
            return $offer;
        });
           
        return redirect()->route('properties.offers', $property)
            ->with('success', __('translations.offers.flashes.success.stored', [
                'id' => $offer->id,
                'property_id' => $offer->property_id
            ]));
    }

    public function store(OfferRequest $request)
    {
        $offer = Offer::create(
            $request->all()
        );      
        return redirect()->route('offers.index')
            ->with('success', __('translations.offers.flashes.success.stored', [
                'id' => $offer->id,
                'property_id' => $offer->property_id
            ]));
    }

    public function edit(Offer $offer)
    {
        $edit = true;
        $offer_statuses = OfferStatus::orderBy('name')->get();
        $properties = Property::orderBy('id')->get();
        return view(
            'offers.create',
            compact('offer', 'edit', 'properties', 'offer_statuses')
            
        );
    }

    public function edit_offer(Property $property, Offer $offer )
    {
        $edit = true;
        $offer_statuses = OfferStatus::orderBy('name')->get();
        return view(
            'offers.create',
            compact('offer', 'edit', 'property', 'offer_statuses')
            
        );
    }

    public function update(OfferRequest $request, Offer $offer)
    {
        //dd($request->all());
        $offer->fill(
            $request->all()
        )->save();
        return redirect()->route('properties.index')
            ->with(
                'success',
                __($offer->wasChanged()
                    ? 'translations.offers.flashes.success.updated'
                    : 'translations.offers.flashes.success.nothing-changed',
                    [
                        'title' => $offer->title
                    ]
                    )
                    );
    }
    public function update_offer(OfferRequest $request,Property $property, Offer $offer)
    {
        //dd($request->all());
        $offer->fill(
            $request->all()
        )->save();
        return redirect()->route('properties.offers', $property)
            ->with(
                'success',
                __($offer->wasChanged()
                    ? 'translations.offers.flashes.success.updated'
                    : 'translations.offers.flashes.success.nothing-changed',
                    [
                        'title' => $offer->title
                    ]
                    )
                    );
    }

}