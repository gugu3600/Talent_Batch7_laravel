<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\RoleController;
use Illuminate\Http\Request;
// use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');]

Route::post("/auth/login", [AuthController::class, "login"]);
Route::apiResource("/products",ProductController::class);
Route::apiResource("/roles",RoleController::class);





Route::group(["middleware" => "auth:api"], function () {
    Route::apiResource("/categories", CategoryController::class);
    Route::post("/auth/signup", [AuthController::class, "register"]);
});
