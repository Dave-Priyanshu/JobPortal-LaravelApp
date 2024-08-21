<?php

use Illuminate\Support\Facades\Route;
use App\Models\Listing;

Route::get('/', function () {
    return view('listings',[
        'heading' => 'Latest Listings',
        'listings' => Listing::all()
    ]);
});

//Single listing
Route::get('/singleListing/{id}',function($id){
    return view('listing',[
        'listing' => Listing::find($id)
    ]);
});