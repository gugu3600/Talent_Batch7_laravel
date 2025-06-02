<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::with('category')->get();

        return view("products.index", ["products" => $products]);
    }

    public function create()
    {
        $categories = Category::all();
        return view("products.create", compact("categories"));
    }

    public function store(ProductRequest $request)
    {
        // $product = new Product();
        
        $data = [
            "category_id" => $request->category_id,
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "image" => $request->image,
        ];

        if($request->hasFile("image")){
            // dd($request->image);
            $imageName = time() . ".jpg";
            $request->image->move(public_path("productImages"),$imageName);
            $data = array_merge($data,["image" => $imageName]);
        }
        
        Product::create($data);

        return redirect()->route("products");
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view("products.show", compact("product"));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view("products.edit", ["product" => $product,"categories" => $categories]);
    }

    public function update($id, ProductUpdateRequest $request)
    {
        $product = Product::find($id);
        $product->update([
            "category_id" => $request->category_id,
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
        ]);

        return redirect()->route("products");
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();
        return redirect()->route("products");
    }
}
