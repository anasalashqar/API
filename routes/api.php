<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
// use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CarController;

Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);

// token login 
Route::middleware("auth:sanctum")->group(function () {
    Route::post("/logout", [AuthController::class, "logout"]);
    Route::get("/profile", [AuthController::class, "profile"]);
});


Route::apiResource('admin/cars', CarController::class);
// GET     /admin/cars           → index()    → Get all users
// POST    /admin/cars           → store()    → Create a new user
// GET     /admin/cars/{id}      → show()     → Get a specific user by ID
// PUT     /admin/cars/{id}      → update()   → Update entire user (usually same as PATCH)
// PATCH   /admin/cars/{id}      → update()   → Update specific fields
// DELETE  /admin/cars/{id}      → destroy()  → Delete a user





Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
