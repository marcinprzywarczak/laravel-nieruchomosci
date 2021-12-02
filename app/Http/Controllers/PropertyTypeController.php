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
}
