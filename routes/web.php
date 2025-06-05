<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// STATIC ROUTE 
Route::get("/",function(){

    return "This is static route";
});

// dynamic route 

Route::get("/dynamic/{id}",function($id){

    return "this is dynamic route $id";
});

// Naming Route

Route::get("/dashboard",function(){

    return "This is naming route";
})->name("myname");

//use naming route with redirect 

Route::get("/naming",function(){

    return redirect()->route("myname");
});

// group route 

Route::prefix("/dashboard")->group(function(){

    Route::get("/admin",function(){
        
        return "This is admin Dashboard";
    });

    Route::get("/user",function(){
        return "this is user Dashboard";
    })->name("user");

    Route::get("/tpp",function(){

        return redirect()->route("user");
    }); 
});

// show view with route link 
Route::get("/categories",[CategoriesController::class,"index"])->name("category.index");
Route::get("/categories/create",[CategoriesController::class,"create"])->name("category.create");
Route::post("/categories/create",[CategoriesController::class,"store"])->name("category.store");

// Route::get("/categories/{id}",[CategoriesController::class,'show']);
Route::get("/categories/{id}",[CategoriesController::class,'show'])->name("category.show");
Route::get("/category/{id}/edit",[CategoriesController::class,"edit"])->name("category.edit");
Route::post("/category/{id}/edit",[CategoriesController::class,"update"])->name("category.update");
Route::post("/category/{id}/delete",[CategoriesController::class,"destroy"])->name("category.delete");


Route::get("/products",[ProductController::class,'index'])->name("products");
Route::get("/products/create",[ProductController::class,'create'])->name("product.create");
Route::post("/products/create",[ProductController::class,'store'])->name("product.store");
Route::get("/products/{id}",[ProductController::class,'show'])->name("product");
Route::get("/products/{id}/edit",[ProductController::class,'edit'])->name("product.edit");
Route::post("/products/{id}/edit",[ProductController::class,'update'])->name("product.update");
Route::post("/products/{id}/delete",[ProductController::class,"destroy"])->name("product.delete");


Route::get("/articles",[ArticleController::class,"index"]);

Route::get("/users",[UserController::class,"index"])->name("users");
Route::get("/users/create",[UserController::class,"create"])->name("user.create");
Route::post("/users/create",[UserController::class,"store"])->name("user.store");
// Route::get("/users/{id}",[UserController::class,"show"])->name("user");
Route::get("/users/{id}/edit",[UserController::class,"edit"])->name("user.edit");
Route::post("/users/{id}/edit",[UserController::class,"update"])->name("user.update");
Route::post("/users/{id}/delete",[UserController::class,"delete"])->name("user.delete");


// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
