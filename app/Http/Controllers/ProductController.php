<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();

        return view("products.index",["products" => $products]);
    }

    public function create()
    {
        return view("products.create");
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->create([
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
        ]);

        return redirect()->route("products");
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view ("products.show",compact("product"));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view("products.edit",["product" => $product]);   
    }

    public function update($id)
    {
        $product = Product::find($id);
        $product->update([
            "name" => Request()->name,
            "description" => Request()->description,
            "price" => Request()->price,
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
