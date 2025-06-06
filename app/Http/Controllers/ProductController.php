<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\ProductServices;

class ProductController extends Controller
{
    //
    protected $productRepository;
    protected $productService;

    public function __construct(ProductRepositoryInterface $productRepository,ProductServices $productService)
    {
     $this->middleware("auth"); 
     $this->productRepository = $productRepository;
     $this->productService = $productService;  

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
       
        $validated = $request->validated();
        
        $data = [
            "category_id" => $validated["category_id"],
            "name" => $validated["name"],
            "description" => $validated["description"],
            "price" => $validated["price"],
            "image" => $request->image,
            "status" => $validated["status"] === "on" ? true : false,
        ];
        
        $this->productService->store($data,$request);

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
