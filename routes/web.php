<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;


// All Listings
Route::get('/', [ListingController::class, 'index']);

//Single listing
Route::get('/singleListing/{listing}',[ListingController::class, 'show']);

//Store listing form data
Route::post('/listings',[ListingController::class, 'store']);

//Show create job form
Route::get('/listings/create',[ListingController::class, 'create']);

//Show edit form
Route::get('/listings/{listing}/edit',[ListingController::class, 'edit']);

//Update Listings
Route::put('/listings/{listing}',[ListingController::class,'update']);

//Delete Listings 
Route::delete('/listings/{listing}',[ListingController::class,'delete']);

//show Registration form 
Route::get('/register',[UserController::class, 'create']);


//create new user
Route::post('/users',[UserController::class, 'store']);