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
            ["category_id" => 1, "name" => "computer", "description" => "bite sar tal", "price" => 200.99],
            ["category_id" => 3, "name" => "keyboard", "description" => "8 chin tal", "price" => 20.99],
            ["category_id" => 3, "name" => "mouse", "description" => "fast and furious mouse", "price" => 18.99],
            ["category_id" => 2, "name" => "phone", "description" => "hang nay tal", "price" => 399.99],
            ["category_id" => 4, "name" => "ipad", "description" => "ma kg boo", "price" => 355.99],
        ];

        foreach ($products as $product) {

            Product::create($product);
        }
    }
}
