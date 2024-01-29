<?php

namespace App\Http\Controllers;

use App\Models\Listing;

// use App\Http\Controllers\request;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{

    // Show all listing

    public function index() {
        return view('listings.index', [
            'listings' => Listing::latest()->try(request(['tag']))->Paginate(4)
        ]);
    }

    // Show create Form

    public function create() {
        return view('listings.create');
    }

    // Show single listing

    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);

    }

    // Store listing data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully');
    }
}
