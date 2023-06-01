<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\NormalUserController;
use App\Http\Controllers\CompanyUserController;
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
// Route::get('/', function () {
//     return view('homepage');
// })->name('home');

// Sign Up Page
// Route::get('/signup', function () {
//     return view('sign-up-option');
// });

// Login Page
// Route::get('/login', function () {
//     return view('login');
// });

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
// Route::get('/normal_user_profile', function () {
//     return view('normal_user_profile');
// });

// Route::get('/company_profile', function () {
//     return view('company_profile');
// });

//Company-Account-Edit-Info
// Route::get('/edit-company-account', function () {
//     return view('edit-company-account');
// });

//User-Account-Edit-Info
// Route::get('/edit-normaluser-account', function () {
//     return view('edit-normaluser-account');
// });

//Edit listing
Route::get('/edit-listing-SCoolCambodia', function () {
    return view('/edit-listing-SCoolCambodia');
});

//Add new listing
Route::get('/add-listing', function () {
    return view('/add-listing');
});

//Render Search Results
Route::get('/search-results', function () {
    return view('/search-results');
});
//* End of to be deleted ------------------------------------------------------------------

//* Route with controller

Route::get('/', [SiteController::class, 'home'])->name('home');

//*---------------------------Sign up Controller --------------------------------------------------

Route::get('/sign-up', [RegisterController::class, 'signUpOption'])->name('sign-up');

Route::get('sign-up/company', [RegisterController::class, 'companyUserSignUpView'])->name('sign-up.company');

Route::get('sign-up/user', [RegisterController::class, 'normalUserSignUpView'])->name('sign-up.user');

// Route for saving user to database
Route::post('/register/company', [RegisterController::class, 'companyUserRegister'])->name('register.company');

Route::post('/register/user', [RegisterController::class, 'normalUserRegister'])->name('register.user');

//*---------------------------Login Controller --------------------------------------------------

Route::get('/login', [LoginController::class, 'loginOption'])->name('login');

Route::get('login/company', [LoginController::class, 'companyUserLoginView'])->name('login.company');

Route::get('login/user', [LoginController::class, 'normalUserLoginView'])->name('login.user');

// Route for saving user to database
Route::post('/logging-in/company', [LoginController::class, 'companyUserLogin'])->name('logging-in.company');

Route::post('/logging-in/user', [LoginController::class, 'normalUserLogin'])->name('logging-in.user');

//*---------------------------Logout Controller --------------------------------------------------

Route::get('/user/normal/logout', [LogoutController::class, 'logNormalUserOut'])->name('user.normal.logout');

Route::get('/user/company/logout', [LogoutController::class, 'logCompanyUserOut'])->name('user.company.logout');

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

Route::middleware(['userAuth:normalUser'])->group(function () {

    Route::get('/user/normal/profile', [NormalUserController::class, 'profile'])->name('user.normal.profile');

    Route::get('/user/normal/profile/edit', [NormalUserController::class, 'editProfile'])->name('user.normal.profile.edit');

});

Route::middleware(['userAuth:companyUser'])->group(function () {

    Route::get('/user/company/profile', [CompanyUserController::class, 'profile'])->name('user.company.profile');

    Route::get('/user/company/profile/edit', [CompanyUserController::class, 'editProfile'])->name('user.company.profile.edit');

});

//* ----------------End of Authenticated Routes-------------------- *//
