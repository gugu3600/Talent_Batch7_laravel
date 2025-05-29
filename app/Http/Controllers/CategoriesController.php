<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function index()
    {

        $categories = Category::all();

        return view("categories.index", [
            "categories" => $categories
        ]);
    }

    public function create()
    {
        return view("categories.create");
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->create(["name" => $request->name]);
        // $category->save();

        return redirect()->route("category.index");
    }

    public function show($id)
    {
        $category = Category::find($id);

        return view("categories.show",compact("category"));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view("categories.edit",["category" => $category]);
    }

    public function update($id,Request $request)
    {
        // $category = Category::find($request->id);
        $category = Category::find($id);

        $category->update(["name" => $request->name]);

        return redirect()->route("category.index");
    }

    public function destroy(Request $request)
    {
        // dd($id);
        $category = Category::find($request->id);
        $category->delete();
        // $category->save();

        return redirect()->route("category.index");
    }
}
