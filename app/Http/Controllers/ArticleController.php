<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //

    public function index()
    {

        $articles = [
            ["id"=>1 , "name"=> "Comic"],
            ["id"=>2 , "name"=> "News"],
            ["id"=>3 , "name"=> "Sports"],
            ["id"=>4 , "name"=> "IT"],
            ["id"=>5 , "name"=> "Manga"]
        ];

        return view("categories.article",
        ["articles"=>$articles]);
    }
}
