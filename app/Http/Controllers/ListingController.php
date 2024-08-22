<?php
namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // To show all listings
    public function index()
    {
        return view('listing.index', [
            'listings' => Listing::all()
        ]);
    }

    // Show a single listing
    public function show(Listing $listing)
    {
        return view('listing.show', [
            'listing' => $listing
        ]);
    }
}
