<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTypes\PropertyTypeRequest;

class PropertyTypeController extends Controller
{
    public function index()
    {
        return view(
            'property_types.index',
            [
                'property_types' => PropertyType::withTrashed()
                    ->withCount('properties')->get()
            ]
            );
    }
    public function create()
    {
        return view('property_types.create');
    }

    public function store(PropertyTypeRequest $request)
    {
        $property_type = PropertyType::create(
            $request->all()
        );      
        return redirect()->route('property_types.index')
            ->with('success', __('translations.property_types.flashes.success.stored', [
                'name' => $property_type->name
            ]));
    }

    public function edit(PropertyType $property_type)
    {
        $edit = true;
        return view(
            'property_types.create',
            compact('property_type', ['edit'])
            
        );
    }

    public function update(PropertyTypeRequest $request, PropertyType $property_type)
    {
        //dd($request->all());
        $property_type->fill(
            $request->all()
        )->save();
        return redirect()->route('property_types.index')
            ->with(
                'success',
                __($property_type->wasChanged()
                    ? 'translations.property_types.flashes.success.updated'
                    : 'translations.property_types.flashes.success.nothing-changed',
                    [
                        'name' => $property_type->name
                    ]
                    )
                    );
    }
}
