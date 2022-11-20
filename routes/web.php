<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
    Route::group(["prefix" => "admin", "as" => "admin.", "middleware" => "auth"], function () {
        Route::get("index", [AdminController::class, "index"])->name("index");
        Route::get("edit/{user:id}", [AdminController::class, "edit"])->name("edit");
        Route::patch("update/{user:id}", [AdminController::class, "update"])->name("update");
    });