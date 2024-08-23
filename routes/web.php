<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;


// All Listings
Route::get('/', [ListingController::class, 'index']);

//Single listing
Route::get('/singleListing/{listing}',[ListingController::class, 'show']);

//store listing form data
Route::post('/listings',[ListingController::class, 'store']);

//show create job form

Route::get('/listings/create',[ListingController::class, 'create']);