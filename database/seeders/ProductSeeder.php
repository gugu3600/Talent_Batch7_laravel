<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = [
            ["category_id" => 1, "name" => "Computer", "description" => "item 1", "price" => 200.99],
            ["category_id" => 3, "name" => "Cloth", "description" => "item 2", "price" => 20.99],
            ["category_id" => 3, "name" => "Book", "description" => "item 3", "price" => 18.99],
            ["category_id" => 2, "name" => "Iphone", "description" => "item 4", "price" => 399.99],
            ["category_id" => 4, "name" => "ipad", "description" => "item 5", "price" => 355.99],
        ];

        foreach ($products as $product) {

            Product::create($product);
        }
    }
}
