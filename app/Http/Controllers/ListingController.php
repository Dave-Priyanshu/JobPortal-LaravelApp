<?php
namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // To show all listings
    public function index(Request $request)
    {   
        // dd(request());
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag','search']))->get()
        ]);
    }

    // Show a single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //show create form
    public function create(){
        return view('listings.create');
    }

    //store form listing data
    public function store(Request $request){
        $formFields = $request->validate([
            'title'=> 'required',
            'company'=> ['required', Rule::unique('listings','company')],
            'location'=> 'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags'=>'required',
            'description'=>'required'
        ]);

        Listing::create($formFields);

        return redirect('/');
    }
}
