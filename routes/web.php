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


Route::get('/properties2', [PropertyController::class, 'index2'])->name('properties2');


require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function(){
    Route::name('property_types.')->prefix('property_types')->group(function(){
        Route::get('', [PropertyTypeController::class, 'index'])
            ->name('index')
            ->middleware(['permission:property_types.index']);

        Route::get('create', [PropertyTypeController::class, 'create'])
            ->name('create')
            ->middleware(['permission:property_types.store']);

        Route::post('', [PropertyTypeController::class, 'store'])
            ->name('store')
            ->middleware(['permission:property_types.store']);

        Route::get('{property_type}/edit', [PropertyTypeController::class, 'edit'])
            ->where('property_type', '[0-9]+')
            ->name('edit')
            ->middleware(['permission:property_types.store']);

        Route::patch('{property_type}', [PropertyTypeController::class, 'update'])
            ->where('property_type', '[0-9]+')
            ->name('update')
            ->middleware(['permission:property_types.store']);
    });

    Route::name('offer_statuses.')->prefix('offer_statuses')->group(function(){
        Route::get('', [OfferStatusController::class, 'index'])
            ->name('index')
            ->middleware(['permission:offer_statuses.index']);

        Route::get('create', [OfferStatusController::class, 'create'])
            ->name('create')
            ->middleware(['permission:offer_statuses.store']);

        Route::post('', [OfferStatusController::class, 'store'])
            ->name('store')
            ->middleware(['permission:offer_statuses.store']);

        Route::get('{offer_status}/edit', [OfferStatusController::class, 'edit'])
            ->where('offer_status', '[0-9]+')
            ->name('edit')
            ->middleware(['permission:offer_statuses.store']);

        Route::patch('{offer_status}', [OfferStatusController::class, 'update'])
            ->where('offer_status', '[0-9]+')
            ->name('update')
            ->middleware(['permission:offer_statuses.store']);
    });

    Route::name('properties.')->prefix('properties')->group(function()
    {
        Route::get('', [PropertyController::class, 'index'])
            ->name('index')
            ->middleware(['permission:properties.index']);
        Route::post('/datatable', [PropertyController::class, 'dataTable'])
            ->name('datatable')
            ->middleware(['permission:properties.index']);
        Route::get('{property}/offers', [PropertyController::class, 'offers'])
            ->where('property', '[0-9]+')
            ->name('offers')
            ->middleware(['permission:properties.index']);

        Route::get('create', [PropertyController::class, 'create'])
            ->name('create')
            ->middleware(['permission:properties.store']);

        Route::get('{property}/create_offer', [OfferController::class, 'create_offer'])
            ->where('property', '[0-9]+')
            ->name('create_offer')
            ->middleware(['permission:offers.store']);

        Route::post('{property}/store_offer', [OfferController::class, 'store_offer'])
            ->where('property', '[0-9]+')
            ->name('store_offer')
            ->middleware(['permission:offers.store']);

        Route::post('', [PropertyController::class, 'store'])
            ->name('store')
            ->middleware(['permission:properties.store']);
    });
    Route::name('offers.')->prefix('offers')->group(function()
    {
        Route::get('', [OfferController::class, 'index'])
            ->name('index')
            ->middleware(['permission:offers.index']);
        Route::post('/datatable', [OfferController::class, 'dataTable'])
            ->name('datatable')
            ->middleware(['permission:offers.index']);

        Route::get('create', [OfferController::class, 'create'])
            ->name('create')
            ->middleware(['permission:offers.store']);
        Route::post('', [OfferController::class, 'store'])
            ->name('store')
            ->middleware(['permission:offers.store']);
    });
});
