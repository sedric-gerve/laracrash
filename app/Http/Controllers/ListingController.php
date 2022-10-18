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
        if($request->hasFile('logo')){
            $formField['logo'] = $request->file('logo')->store('logos', 'public');

        }
        $formField['user_id'] = auth()->id();
        Listing::create($formField);
           return redirect('/')->with('message','listing create successfully!');

    }
    //Show Edit Form
    public function edit(Listing $listing){
        return view ('listings.edit', ['listing'=>$listing]);
    }
//Update Listing Data
        public function update(Request $request, Listing $listing){
            // Make sure logged in user is owner
            if($listing->user_id != auth()->id()){
                abort(405,'Unauthaurized Action');
            } 
            $formField = $request->validate([
                'title'=>'required',
                'company'=>['required'], 
                'location'=>'required',
                'webside'=>'required',
                'email'=>['required', 'email'],
                'tags'=>'required',
                'description'=>'required',
    
            ]);

            if($request->hasFile('logo')){
                $formField['logo'] = $request->file('logo')->store('logos', 'public');
    
            }
            $listing->update($formField);
               return back()->with('message','listing updated successfully!');
    

    }
    public function destroy(Listing $listing){
         // Make sure logged in user is owner
         if($listing->user_id != auth()->id()){
            abort(405,'Unauthaurized Action');
        } 
$listing->delete();
return redirect('/')->with('message', 'listing delete successfully!');
    }
    // Manage Listing
    public function manage(){
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}

