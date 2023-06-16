<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\APIControllers\SiteController;
use App\Http\APIControllers\NormalUserController;
use App\Http\APIControllers\Controller;
use App\Http\APIControllers\CompnayUserController;
use App\Http\APIControllers\auth\RegisterController;
use App\Http\APIControllers\auth\LoginController;
use App\Http\APIControllers\auth\LogoutController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

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
