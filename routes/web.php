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
// Route::get('/categoryshow', function () {
//     return view('categoryshow');
// });

// Automotive-Vehicle category page
// Route::get('/automotive_cate', function () {
//     return view('automotive_cate');
// });

// First Company Detail page
// Route::get('/s-cool-cambodia', function () {
//     return view('s-cool-cambodia');
// });
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
// Route::get('/edit-listing-SCoolCambodia', function () {
//     return view('/edit-listing-SCoolCambodia');
// });

//Add new listing
// Route::get('/add-listing', function () {
//     return view('/add-listing');
// });

//Render Search Results
Route::get('/search-results', function () {
    return view('/search-results');
});
//* End of to be deleted ------------------------------------------------------------------

//* Route with controller
Route::controller(SiteController::class)->group(function() {

    Route::get('/', 'home')->name('home');

    Route::get('/category', 'categories')->name('category');

    route::get('/category/{categoryName}', 'categoryShowCompany')->name('category.categoryName');

    route::get('/category/{categoryName}/{companyName}', 'companyDetail')->name('category.categoryName.companyName');

    route::get('/search' , 'search')->name('search');

    Route::post('/category/{categoryName}/{companyName}/save', 'saveCompany')->name('category.categoryName.companyName.save');

    Route::post('/category/{categoryName}/{companyName}/feedback/post', 'postFeedback')->name('category.categoryName.companyName.feedback.post');

    Route::post('/category/{categoryName}/{companyName}/report/post', 'postReport')->name('category.categoryName.companyName.report.post');

    Route::post('/category/{categoryName}/{companyName}/rate/post', 'postRate')->name('category.categoryName.companyName.rate.post');

});

//*---------------------------Sign up Controller --------------------------------------------------
// Group route by RegisterController
Route::controller(RegisterController::class)->group(function() {

    Route::get('/sign-up', 'signUpOption')->name('sign-up');

    Route::get('sign-up/company', 'companyUserSignUpView')->name('sign-up.company');

    Route::get('sign-up/user', 'normalUserSignUpView')->name('sign-up.user');

    // Route for saving user to database
    Route::post('/register/company', 'companyUserRegister')->name('register.company');

    Route::post('/register/user', 'normalUserRegister')->name('register.user');

});

//*---------------------------Login Controller --------------------------------------------------
// Group route by LoginController
Route::controller(LoginController::class)->group(function() {

    Route::get('/login', 'loginOption')->name('login');

    Route::get('login/company', 'companyUserLoginView')->name('login.company');

    Route::get('login/user', 'normalUserLoginView')->name('login.user');

    // Route for saving user to database
    Route::post('/logging-in/company', 'companyUserLogin')->name('logging-in.company');

    Route::post('/logging-in/user', 'normalUserLogin')->name('logging-in.user');

});

//*---------------------------Logout Controller --------------------------------------------------
// Group route by LogoutController
Route::controller(LogoutController::class)->group(function() {

    Route::get('/user/normal/logout', 'logNormalUserOut')->name('user.normal.logout');

    Route::get('/user/company/logout', 'logCompanyUserOut')->name('user.company.logout');

});

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

    Route::get('/user/normal/{name}/{id}/profile', [NormalUserController::class, 'profile'])->name('user.normal.name.id.profile');

    Route::get('/user/normal/{name}/{id}/profile/edit', [NormalUserController::class, 'editProfile'])->name('user.normal.name.id.profile.edit');

    Route::post('/user/normal/{name}/{id}/profile/edit/save', [NormalUserController::class, 'saveEditProfile'])->name('user.normal.name.id.profile.edit.save');

    Route::post('/user/normal/{name}/{id}/remove-saved-company', [NormalUserController::class, 'removeSavedCompany'])->name('user.normal.name.id.remove-saved-company');

});

Route::middleware(['userAuth:companyUser'])->group(function () {

    Route::get('/user/company/{name}/{id}/profile', [CompanyUserController::class, 'profile'])->name('user.company.name.id.profile');

    Route::get('/user/company/{name}/{id}/profile/edit', [CompanyUserController::class, 'editProfile'])->name('user.company.name.id.profile.edit');

    Route::post('/user/company/{name}/{id}/profile/edit/save', [CompanyUserController::class, 'saveEditProfile'])->name('user.company.name.id.profile.edit.save');


    Route::get('/user/company/{name}/{id}/add-company', [CompanyUserController::class, 'addCompany'])->name('user.company.name.id.add-company');

    Route::post('/user/company/{name}/{id}/add-company/save', [CompanyUserController::class, 'addCompanySave'])->name('user.company.name.id.add-company.save');

    Route::get('/user/company/{name}/{id}/edit-company', [CompanyUserController::class, 'editCompany'])->name('user.company.name.id.edit-company');

    Route::patch('/user/company/{name}/{id}/edit-company/save', [CompanyUserController::class, 'saveEditCompany'])->name('user.company.name.id.edit-company.save');

    Route::get('/user/company/{name}/{id}/remove-company', [CompanyUserController::class, 'removeCompany'])->name('user.company.name.id.removeCompany');

    // Route::get('/test', [SiteController::class, 'test']);

});

//* ----------------End of Authenticated Routes-------------------- *//
Route::get('/test', [SiteController::class, 'test']);
