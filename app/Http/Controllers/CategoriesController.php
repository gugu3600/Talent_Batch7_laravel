<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ControllerUpdateRequest;

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
        $data = $request->validate([
            "name" => "required|string",
            "image" => "required",
        ]);

        if($request->hasFile("image")){
            // dd($request->all());
            $imageName = time() . "." . $request->image->extension();
            $request->image->move(public_path("categoryImages"),$imageName);
            $data = array_merge($data,["image" => $imageName ]);
        }

        Category::create($data);
        // $category = new Category();
        // $category->create($data);
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

    public function update($id,ControllerUpdateRequest $request)
    {
        // $category = Category::find($request->id);
        $category = Category::find($id);

        $category->update(['name' => $request->name]);

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
