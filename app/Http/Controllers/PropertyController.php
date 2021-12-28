<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\DataTables\PropertyDataTable;
use App\Http\Requests\Properties\PropertyRequest;

class PropertyController extends Controller
{
    public function index(PropertyDataTable $dataTable)
    {
        return $dataTable->render('properties.index');
    }

    public function dataTable(PropertyDataTable $dataTable)
    {
        return $dataTable->render('properties.index');
    }
    public function index2()
    {
        return view(
            'properties.index2',
            [
                'properties' => Property::with('property_type')->with('offer')->with('offer_status')
                                ->select('properties.*')->paginate(config('app.default_page_size'))
            ]
            );
    }
    public function offers(Property $property)
    {
        $offers = $property->offers;
        return view(
            'offers.index',
            [
                'offers' => $offers,
                'property' => $property
            ]
            );
    }

    public function offers_trashed(int $id)
    {
        $property = Property::onlyTrashed()->findOrFail($id);
        $offers = $property->offers;
        return view(
            'offers.index',
            [
                'offers' => $offers,
                'property' => $property
            ]
            );
    }

    public function create(Request $request)
    {
        return view('properties.create', 
        [
            'property_type' => PropertyType::find($request->old('property_type_id'))
        ]);
    }

    public function store(PropertyRequest $request)
    {
        


        $property = Property::create(
            $request->all()
        );      
        return redirect()->route('properties.index')
            ->with('success', __('translations.properties.flashes.success.stored', [
                'address' => $property->address,
                'id' => $property->id
            ]));
    }

    public function edit(Property $property, Request $request)
    {
        $edit = true;
        $property_type =  PropertyType::find($request->old('property_type_id'));
        return view(
            'properties.create',
            compact('property', 'edit', 'property_type')
            
        );
    }

    public function update(PropertyRequest $request, Property $property)
    {
        //dd($request->all());
        $property->fill(
            $request->all()
        )->save();
        return redirect()->route('properties.index')
            ->with(
                'success',
                __($property->wasChanged()
                    ? 'translations.properties.flashes.success.updated'
                    : 'translations.properties.flashes.success.nothing-changed',
                    [
                        'address' => $property->address
                    ]
                    )
                    );
    }


    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index')
            ->with('success', __('translations.properties.flashes.success.destroy', [
                'address' => $property->address
            ]));
    }

    public function restore(int $id)
    {
        $property = Property::onlyTrashed()->findOrFail($id);
        $property->restore();
        return redirect()->route('properties.index')
            ->with('success', __('translations.properties.flashes.success.restore', [
                'address' => $property->address
            ]));
    }
}