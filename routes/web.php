<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\CommonMark\Node\Block\Heading;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Common route Resources Route:
//index - Show all listen
//show - show single listing
//create - Show form to create  new listing
//store - Store new listing
//edit - show form to edit listing
//update - Update listing
//destroy - Delete listing

//all listings
Route::get('/',[ListingController::class, 'index']);
//show create form
Route::get('/listings/create',[ListingController::class, 'create']);
//single listings
Route::get('/listings/{listing}',[ListingController::class, 'show']);


