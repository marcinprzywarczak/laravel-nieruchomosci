<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\DataTables\OfferDataTable;

class OfferController extends Controller
{
    public function index(OfferDataTable $dataTable)
    {
        return $dataTable->render('offers.index');
    }

    public function dataTable(OfferDataTable $dataTable)
    {
        return $dataTable->render('offers.index');
    }

}