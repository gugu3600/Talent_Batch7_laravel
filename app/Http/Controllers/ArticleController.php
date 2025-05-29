<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;

class ArticleController extends Controller
{
    //

    public function index()
    {
        $articles = Articles::all();
        return view("articles.index",
        ["articles"=>$articles]);
    }
}
