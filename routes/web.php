<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\OfferStatusController;
use App\Http\Controllers\PropertyTypeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function(){
    Route::name('property_types.')->prefix('property_types')->group(function(){
        Route::get('', [PropertyTypeController::class, 'index'])
            ->name('index')
            ->middleware(['permission:property_types.index']);
    });

    Route::name('offer_statuses.')->prefix('offer_statuses')->group(function(){
        Route::get('', [OfferStatusController::class, 'index'])
            ->name('index')
            ->middleware(['permission:offer_statuses.index']);
    });

    Route::name('properties.')->prefix('properties')->group(function()
    {
        Route::get('', [PropertyController::class, 'index'])
            ->name('index')
            ->middleware(['permission:properties.index']);
        Route::post('/datatable', [PropertyController::class, 'dataTable'])
            ->name('datatable')
            ->middleware(['permission:properties.index']);
    });
    Route::name('offers.')->prefix('offers')->group(function()
    {
        Route::get('', [OfferController::class, 'index'])
            ->name('index')
            ->middleware(['permission:offers.index']);
        Route::post('/datatable', [OfferController::class, 'dataTable'])
            ->name('datatable')
            ->middleware(['permission:offers.index']);
    });
});
