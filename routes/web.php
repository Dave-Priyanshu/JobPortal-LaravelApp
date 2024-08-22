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
Route::get('/singleListing/{listing}',function(Listing $listing){
    // $listing = Listing::find($id);
    return view('listing',[
        'listing' => $listing
    ]);
    
});

Route::get('/pagenotfound', function () {
    return view('pagenotfound');
})->name('pagenotfound');
