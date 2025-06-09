<?php 

namespace App\Services;

use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\File;


class ProductServices 
{

    protected $productRepo;
    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function store($data,$request)
    {
        if($request->hasFile("image")){
            $imgName = $data["name"] . time() . ".jpg";
            $request->image->move(public_path("productImages"),$imgName);
            $data["image"] = $imgName;
        }

        return $this->productRepo->store($data);
    }
}