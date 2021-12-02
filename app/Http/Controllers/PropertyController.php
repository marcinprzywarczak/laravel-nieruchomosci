<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Http\Controllers\Controller;
use App\Services\DataTables\PropertyDataTable;

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
                'offers' => $offers
            ]
            );
    }
}