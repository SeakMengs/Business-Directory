<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return view('homepage');
});

// Sign Up Page
Route::get('/signup', function(){
    return view('signup');
});

// Login Page
Route::get('/login', function(){
    return view('login');
});

// View More Category Page
Route::get('/categoryshow', function(){
    return view('categoryshow');
});

// Subcategory1 page
Route::get('/subcate1', function(){
    return view('subcate1');
});

// Automotive-Vehicle category page
Route::get('/automotive_cate', function(){
    return view('automotive_cate');
});

// First Company Detail page
Route::get('/s-cool-cambodia', function(){
    return view('s-cool-cambodia');
});
Route::get('/normal_user_profile', function () {
    return view('normal_user_profile');
});

Route::get('/company_profile', function () {
    return view('company_profile');
});

//Company-Account-Edit-Info
Route::get('/edit-company-account', function () {
    return view('edit-company-account');
});

//Edit listing
Route::get('/edit-listing-SCoolCambodia', function () {
    return view('/edit-listing-SCoolCambodia');
});

//Add new listing
Route::get('/add-listing', function () {
    return view('/add-listing');
});


