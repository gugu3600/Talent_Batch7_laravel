<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
        public function index()
        {
              
        $categories = [
            ["id"=>1,"name"=>"PHP"],
            ["id"=>2,"name"=>"Java"],
            ["id"=>3,"name"=>"C"],
            ["id"=>4,"name"=>"C++"],
            ["id"=>5,"name"=>"Python"],
        ];

        return view("categories.index",[
            "categories" => $categories
        ]);
        }
}
