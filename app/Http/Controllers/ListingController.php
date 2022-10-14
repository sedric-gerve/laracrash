<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // get and show all listings
    public function index(){
        return view('listings.index',[
            'listings'=>Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
               ]
        );

    }
    // show single listing
    public function show(Listing $listing){
        return view('listings.show',[
            'listing'=>$listing
           ]);

    }
    //show create Form
    public function create(){
        return view('listings.create');
    }
    //store listing data
    public function store(Request $request){
        $formField = $request->validate([
            'title'=>'required',
            'company'=>['required', Rule::unique('listings','company')],
            'location'=>'required',
            'webside'=>'required',
            'email'=>['required', 'email'],
            'tags'=>'required',
            'description'=>'required',

        ]);
        Listing::create($formField);
           return redirect('/')->with('message','listing create successfully!');

    }
}

