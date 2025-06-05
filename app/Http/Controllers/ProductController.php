<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Repositories\Product\ProductRepository;

class ProductController extends Controller
{
    //
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
     $this->productRepository = $productRepository;   
    }
    public function index()
    {
        // $products = Product::with('category')->get();
        $products = $this->productRepository->index();
        return view("products.index", ["products" => $products]);
    }

    public function create()
    {
        // $categories = Category::all();
        // echo ""
        $categories = $this->productRepository->create();
        return view("products.create", compact("categories"));
    }

    public function store(ProductRequest $request)
    {
       
        
        $data = [
            "category_id" => $request->category_id,
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "image" => $request->image,
            "status" => $request->status === "on" ? true : false,
        ];

        if($request->hasFile("image")){
            // dd($request->image);
            $imageName = time() . ".jpg";
            $request->image->move(public_path("productImages"),$imageName);
            $data = array_merge($data,["image" => $imageName]);
        }

        // print_r($data);
        
        $this->productRepository->store($data);

        return redirect()->route("products");
    }

    public function show($id)
    {
        $product = $this->productRepository->find($id);

        return view("products.show", compact("product"));
    }

    public function edit($id)
    {
        $categories = $this->productRepository->create();
        $product = $this->productRepository->find($id);
        return view("products.edit", ["product" => $product,"categories" => $categories]);
    }

    public function update($id, ProductUpdateRequest $request)
    {
        // $product = Product::find($id);
        $product = $this->productRepository->find($id);

        $data = [
            "category_id" => $request->category_id,
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "status" => $request->status === "on" ? true : false,
        ];

        $product->update($data);

        return redirect()->route("products");
    }

    public function destroy($id)
    {
        // $product = Product::find($id);
        $product = $this->productRepository->find($id);

        $product->delete();
        return redirect()->route("products");
    }
}
