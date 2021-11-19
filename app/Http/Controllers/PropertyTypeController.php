<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
use Illuminate\Http\Request;

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
}
