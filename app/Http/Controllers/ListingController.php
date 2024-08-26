<?php
namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Termwind\Components\Li;

class ListingController extends Controller
{
    // To show all listings
    public function index(Request $request)
    {   
        // dd(request());
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(6)
        ]);
    }

    // Show a single listing
    public function show(Listing $listing)
    {
        $listing->load('user');
        
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

        if($request->hasFile('logo')){
            $formFields['logo']= $request->file('logo')->store('logos','public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message','Listing created successfully!');
    }

    // show edit form
    public function edit(Listing $listing){
        // dd($listing->title);
        return view('listings.edit',['listing'=>$listing]);
    }

    //update
    public function update(Request $request, Listing $listing){
        $formFields = $request->validate([
            'title'=> 'required',
            'company'=> 'required',
            'location'=> 'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags'=>'required',
            'description'=>'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo']= $request->file('logo')->store('logos','public');
        }
        $listing->update($formFields);

        return redirect('/')->with('message','Listing Updated successfully!');
    }

    public function delete(Listing $listing){
        // dd($listing);
        $listing->delete();
        return redirect('/')->with('message','Job Deleted Successfully!');
    }
}
