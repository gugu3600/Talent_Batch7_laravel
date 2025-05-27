<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ArticleController;
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
Route::get("/categories",[CategoriesController::class,"index"]);


Route::get("/articles",[ArticleController::class,"index"]);
