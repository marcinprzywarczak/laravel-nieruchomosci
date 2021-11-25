<?php

namespace App\Http\Controllers;

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

}