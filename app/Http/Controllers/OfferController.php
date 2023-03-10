<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Property;
use App\Models\OfferStatus;
use Illuminate\Http\Request;
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
    public function create(Request $request)
    {
        return view('offers.create', 
        [
            'offer_status' => OfferStatus::find($request->old('offer_status_id')),
            'properties' => Property::find($request->old('property_id'))
        ]);
    }

    public function create_offer(Property $property, Request $request)
    {
        return view(
            'offers.create',
            [
                'offer_status' => OfferStatus::find($request->old('offer_status_id')),
                'property' => $property
            ]
            );
    }

    public function store_offer(OfferRequest $request, Property $property)
    {
        
        //dd($request->get('property_id'));
        $offers = Offer::where('property_id', $request->get('property_id'));
        $offer = DB::transaction(function () use($request, $offers) {
            $offers->delete();
            $offer = Offer::create(
                $request->all()
            );
            return $offer;
        });
           
        return redirect()->route('properties.offers', $property)
            ->with('success', __('translations.offers.flashes.success.stored', [
                'title' => $offer->title,
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
                'title' => $offer->title,
                'property_id' => $offer->property_id
            ]));
    }

    public function edit(Offer $offer, Request $request)
    {
        $edit = true;
        $offer_status = OfferStatus::find($request->old('offer_status_id'));
        $properties = Property::find($request->old('property_id'));
        return view(
            'offers.create',
            compact('offer', 'edit', 'properties', 'offer_status')
            
        );
    }

    public function edit_offer(Property $property, Offer $offer , Request $request)
    {
        $edit = true;
        $offer_status = OfferStatus::find($request->old('offer_status_id'));
        return view(
            'offers.create',
            compact('offer', 'edit', 'property', 'offer_status')
            
        );
    }

    public function update(OfferRequest $request, Offer $offer)
    {
        //dd($request->all());
        $offer->fill(
            $request->all()
        )->save();
        return redirect()->route('offers.index')
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
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->route('offers.index')
            ->with('success', __('translations.offers.flashes.success.destroy' , [
                'title' => $offer->title
            ]));

    }

    public function restore(int $id)
    {
        $offer = Offer::onlyTrashed()->findOrFail($id);
        $offer->restore();
        return redirect()->route('offers.index')
        ->with('success', __('translations.offers.flashes.success.restore' , [
            'title' => $offer->title
        ]));
    }

    public function destroy_offer(Property $property, Offer $offer)
    {
        $offer->delete();
        return redirect()->route('properties.offers', $property)
            ->with('success', __('translations.offers.flashes.success.destroy' , [
                'title' => $offer->title
            ]));

    }

    public function restore_offer(Property $property, int $id)
    {
        $offer = Offer::onlyTrashed()->findOrFail($id);
        $offer->restore();
        return redirect()->route('properties.offers', $property)
        ->with('success', __('translations.offers.flashes.success.restore' , [
            'title' => $offer->title
        ]));
    }
}