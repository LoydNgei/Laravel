<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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


Route::get('/', [PagesController::class, 'index']);

Route::get('/about', [PagesController::class, 'about']);

Route::get('/services', [PagesController::class, 'services']);





// Single Listing

Route::get('/listings/{id}', function ($id) {
    return view('listing', [
        'listing' => Listing::find($id)
    ]);
});

