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
Route::post('/listings',[ListingController::class, 'store'])->middleware('auth');

//Show create job form
Route::get('/listings/create',[ListingController::class, 'create'])->middleware('auth');

//Show edit form
Route::get('/listings/{listing}/edit',[ListingController::class, 'edit'])->middleware('auth');

//Update Listings
Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth');

//Delete Listings 
Route::delete('/listings/{listing}',[ListingController::class,'delete'])->middleware('auth');

//Manage Listings
Route::get('/listings/manage',[ListingController::class,'manage'])->middleware('auth');

//show Registration form 
Route::get('/register',[UserController::class, 'create'])->middleware('guest');

//create new user
Route::post('/users',[UserController::class, 'store']);

//logout
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

//show login form
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

//login user
Route::post('/users/authenticate',[UserController::class,'authenticate']);
