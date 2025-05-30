<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;

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

    public function store(ProductRequest $request)
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

    public function update($id,ProductUpdateRequest $request)
    {
        $product = Product::find($id);
        $product->update([
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
