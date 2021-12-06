<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;
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

    public function create()
    {
        return view('properties.create', 
        [
            'property_types' => PropertyType::orderBy('name')->get()
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

    public function edit(Property $property)
    {
        $edit = true;
        $property_types = PropertyType::orderBy('name')->get();
        return view(
            'properties.create',
            compact('property', 'edit', 'property_types')
            
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
}