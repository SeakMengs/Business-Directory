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

    Route::get('/', 'home')->name('api.home');

    Route::get('/category', 'categories')->name('api.category');

    route::get('/category/{categoryName}', 'categoryShowCompany')->name('api.category.categoryName');

    route::get('/category/{categoryName}/{companyName}', 'companyDetail')->name('api.category.categoryName.companyName');

    route::get('/search' , 'search')->name('api.search');

    Route::post('/category/{categoryName}/{companyName}/save', 'saveCompany')->name('api.category.categoryName.companyName.save');

    Route::post('/category/{categoryName}/{companyName}/feedback/post', 'postFeedback')->name('api.category.categoryName.companyName.feedback.post');

    Route::post('/category/{categoryName}/{companyName}/report/post', 'postReport')->name('api.category.categoryName.companyName.report.post');

    Route::post('/category/{categoryName}/{companyName}/rate/post', 'postRate')->name('api.category.categoryName.companyName.rate.post');

});

//*---------------------------Sign up Controller --------------------------------------------------
// Group route by RegisterController
Route::controller(RegisterController::class)->group(function() {

    Route::get('/sign-up', 'signUpOption')->name('api.sign-up');

    Route::get('sign-up/company', 'companyUserSignUpView')->name('api.sign-up.company');

    Route::get('sign-up/user', 'normalUserSignUpView')->name('api.sign-up.user');

    // Route for saving user to database
    Route::post('/register/company', 'companyUserRegister')->name('api.register.company');

    Route::post('/register/user', 'normalUserRegister')->name('api.register.user');

});

//*---------------------------Login Controller --------------------------------------------------
// Group route by LoginController
Route::controller(LoginController::class)->group(function() {

    Route::get('/login', 'loginOption')->name('api.login');

    Route::get('login/company', 'companyUserLoginView')->name('api.login.company');

    Route::get('login/user', 'normalUserLoginView')->name('api.login.user');

    // Route for saving user to database
    Route::post('/logging-in/company', 'companyUserLogin')->name('api.logging-in.company');

    Route::post('/logging-in/user', 'normalUserLogin')->name('api.logging-in.user');

});

//*---------------------------Logout Controller --------------------------------------------------
// Group route by LogoutController
Route::controller(LogoutController::class)->group(function() {

    Route::get('/user/normal/logout', 'logNormalUserOut')->name('api.user.normal.logout');

    Route::get('/user/company/logout', 'logCompanyUserOut')->name('api.user.company.logout');

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

    Route::get('/user/normal/{name}/{id}/profile', [NormalUserController::class, 'profile'])->name('api.user.normal.name.id.profile');

    Route::get('/user/normal/{name}/{id}/profile/edit', [NormalUserController::class, 'editProfile'])->name('api.user.normal.name.id.profile.edit');

    Route::post('/user/normal/{name}/{id}/profile/edit/save', [NormalUserController::class, 'saveEditProfile'])->name('api.user.normal.name.id.profile.edit.save');

    Route::post('/user/normal/{name}/{id}/remove-saved-company', [NormalUserController::class, 'removeSavedCompany'])->name('api.user.normal.name.id.remove-saved-company');

});

Route::middleware(['userAuth:companyUser'])->group(function () {

    Route::get('/user/company/{name}/{id}/profile', [CompanyUserController::class, 'profile'])->name('api.user.company.name.id.profile');

    Route::get('/user/company/{name}/{id}/profile/edit', [CompanyUserController::class, 'editProfile'])->name('api.user.company.name.id.profile.edit');

    Route::post('/user/company/{name}/{id}/profile/edit/save', [CompanyUserController::class, 'saveEditProfile'])->name('api.user.company.name.id.profile.edit.save');


    Route::get('/user/company/{name}/{id}/add-company', [CompanyUserController::class, 'addCompany'])->name('api.user.company.name.id.add-company');

    Route::post('/user/company/{name}/{id}/add-company/save', [CompanyUserController::class, 'addCompanySave'])->name('api.user.company.name.id.add-company.save');

    Route::get('/user/company/{name}/{id}/edit-company', [CompanyUserController::class, 'editCompany'])->name('api.user.company.name.id.edit-company');

    Route::patch('/user/company/{name}/{id}/edit-company/save', [CompanyUserController::class, 'saveEditCompany'])->name('api.user.company.name.id.edit-company.save');

    Route::get('/user/company/{name}/{id}/remove-company', [CompanyUserController::class, 'removeCompany'])->name('api.user.company.name.id.removeCompany');

    // Route::get('/test', [SiteController::class, 'test']);

});
