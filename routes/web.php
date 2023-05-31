<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\RegisterController;

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

//* To be deleted ---------------------------
Route::get('/', function () {
    return view('homepage');
});

// Sign Up Page
// Route::get('/signup', function () {
//     return view('sign-up-option');
// });

// Login Page
Route::get('/login', function () {
    return view('login');
});

// View More Category Page
Route::get('/categoryshow', function () {
    return view('categoryshow');
});

// Automotive-Vehicle category page
Route::get('/automotive_cate', function () {
    return view('automotive_cate');
});

// First Company Detail page
Route::get('/s-cool-cambodia', function () {
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

//User-Account-Edit-Info
Route::get('/edit-normaluser-account', function () {
    return view('edit-normaluser-account');
});

//Edit listing
Route::get('/edit-listing-SCoolCambodia', function () {
    return view('/edit-listing-SCoolCambodia');
});

//Add new listing
Route::get('/add-listing', function () {
    return view('/add-listing');
});
//* End of to be deleted ------------------------------------------------------------------

//* Route with controller

Route::get('/sign-up', [RegisterController::class, 'signUpOption'])->name('sign-up');

Route::get('sign-up/company', [RegisterController::class, 'companyUserSignUpView'])->name('sign-up.company');

Route::get('sign-up/user', [RegisterController::class, 'normalUserSignUpView'])->name('sign-up.user');

// Route for saving user to database
Route::post('/register/company', [RegisterController::class, 'companyUserRegister'])->name('register.company');

Route::post('/register/user', [RegisterController::class, 'normalUserRegister'])->name('register.user');

//* End of Route with controller


//* ---------------Authenticated Routes---------------------------- *//

/*
 * 1. Group route for auth normal user (Only accessible after login)
 *
 * 2. userAuth is the registered custom middleware that can be found in app\Http\Kernel.php line 67
 *
 * 3. :normalUser is the guard name that can be found in config\auth.php line 50 and 78.
 *    + :normalUser is the argument that will be passed to the custom middleware ($role)
 *
 * 4. related to custom middleware, the guard name is used to determine access to the route
 *    the custom middleware can be found in app\Http\Middleware\UserMiddleware.php
 */

Route::middleware('userAuth:normalUser')->group(function () {

    Route::get('/user/normal/profile/edit', function () {
        return view('edit-normaluser-account');
    })->name('user.normal.profile.edit');

});

Route::middleware('userAuth:companyUser')->group(function () {

    Route::get('/user/company/profile/edit', function () {
        return view('edit-company-account');
    })->name('user.company.profile.edit');

});

//* ----------------End of Authenticated Routes-------------------- *//
