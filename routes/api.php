<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
// use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CarController;





// GET     /admin/admin/cars           → index()    → Get all users
// POST    /admin/admin/cars           → store()    → Create a new user
// GET     /admin/admin/cars/{id}      → show()     → Get a specific user by ID
// PUT     /admin/admin/cars/{id}      → update()   → Update entire user (usually same as PATCH)
// PATCH   /admin/admin/cars/{id}      → update()   → Update specific fields
// DELETE  /admin/admin/cars/{id}      → destroy()  → Delete a user





Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
