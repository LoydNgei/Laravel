<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// COMMON RESOURCE ROUTES

// index - show all listings
// show - show single listings
// create - show form to create new listing
// store - Store new listing
// edit - show form to edit listing
// update - update listing
// destroy - Delete listing



// All Listings
Route::get('/', [ListingController::class, 'index']);



// Show create form
Route::get('/listings/create', [ListingController::class, 'create']);


// Post create form
Route::post('/listings/', [ListingController::class, 'store']);


//Edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);


// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->name('listing.update');


// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->name('listing.destroy');


// User Register form
Route::get('/register', [UserController::class, 'create']);


// Create new user

Route::post('/users', [UserController::class, 'store']);


// Single Listing -> ROUTE BINDING TECHNIQUE
Route::get('/listings/{listing}', [ListingController::class, 'show']);
