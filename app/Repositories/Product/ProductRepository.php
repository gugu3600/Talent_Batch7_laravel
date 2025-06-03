<?php 

namespace App\Repositories\Product;

use App\Models\Category;
use App\Models\Product;


class ProductRepository implements ProductRepositoryInterface
{
    public function index()
    {
        $products = Product::with("category")->get();
        return $products;
    }

    public function create()
    {
        $categories = Category::all();

        return $categories;
    }

    public function store($data)
    {
        return Product::create($data);
    }

    public function find($id)
    {
        return Product::find($id);
    }
}