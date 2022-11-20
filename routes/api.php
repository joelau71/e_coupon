<?php

use App\Http\Controllers\Api\ScoreController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
//     ],
//     function () {
        Route::group(["prefix" => "user", "as" => "user."], function(){
            Route::post("register", [UserController::class, "register"])->name("register");
            Route::post("login", [UserController::class, "login"])->name("login");
        
            Route::group(["middleware" => "auth:sanctum"], function(){
                Route::post("getScore", [ScoreController::class, "getScore"])->name("getScore");
                Route::get("getCoupon", [ScoreController::class, "getCoupon"])->name("getCoupon");
                Route::post("logout", [UserController::class, "logout"])->name("logout");
                Route::get("show/{user:id}", [UserController::class, "show"])->name("show");
                Route::patch("changePassword/{id}", [UserController::class, "changePassword"])->name("changePassword");
                Route::patch("update/{user:id}", [UserController::class, "update"])->name("update");
            });
        });
//     }
// );


