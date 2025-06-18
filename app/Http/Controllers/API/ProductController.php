<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductAPIResource;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\ProductServices;
use App\Http\Controllers\API\BaseController;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Validator;

class ProductController extends BaseController
{
    protected $productRepo;
    protected $productService;

    public function __construct(ProductRepositoryInterface $productRepo, ProductServices $productService)
    {
        $this->productRepo = $productRepo;
        $this->productService = $productService;

        $this->middleware('permission:productList', ['only' => ['index']]);
        $this->middleware('permission:productCreate', ['only' => ['store']]);
        $this->middleware('permission:productUpdate', ['only' => ['update']]);
        $this->middleware('permission:productDelete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $products = $this->productRepo->index();
        $data = ProductAPIResource::collection($products);

        return $this->success($data, "Products Retrives Successfully", 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $validated = $request->validated();

        $categories = $this->productRepo->create();
        // dd($categories);

        // if ($validated->fails()) {

        //     return $this->error("Cannot add new products", $validated->errors(), 422);
        // }


        $data = [
            "name" => $validated["name"],
            "category_id" => $validated["category_id"],
            "description" => $validated["description"],
            "image" => $request->image,
            "price" => $validated["price"],
            "status" => $validated["status"]
        ];



        $imgName = $data["name"] . time() . ".jpg";

        $data["image"] = $imgName;

        foreach ($categories as $category) {
            if ($category->id == $data["category_id"]) {
                $this->productService->store($data, $request);
                return $this->success($data, "Products created successfully", 200);
            }
        }
        return $this->error("Category doen't found", null, 418);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = $this->productRepo->find($id);
        $data = new ProductAPIResource($product);

        return $this->success($data, "Product Retrive Successfully", 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $categories = $this->productRepo->create();

        $validated = Validator::make($request->all(), [
            "name" => "required|string",
            "description" => "nullable",
            "price" => "required",
            "image" => "nullable",
            "category_id" => "required|exists:categories,id"
        ]);

        if ($validated->fails()) {
            return $this->error("Error Updatin Item", $validated->errors(), 422);
        }

        // $product = [
        //     "name" => $request->name,
        //     "description" => $request->description,
        //     "price" => $request->price,
        //     "category_id" => $request->category_id
        // ];
        // dd($request->category_id);

        $product = $this->productRepo->find($id);

        // foreach ($categories as $category){
        // if($category->id == $request->category_id){
        $product->update($request->all());
        return $this->success($product, "Product Updated successfully ", 200);
        // }
        // }

        // return $this->error("Cannot created Product","Category_ID doesn't exist",418);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = $this->productRepo->find($id);

        $product->delete();

        return $this->success(null, "Product Deleted Successfully", 200);
    }
}
