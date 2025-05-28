<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $categories = [
            ["id"=>1,"name"=>"PHP"],
            ["id"=>2,"name"=>"Java"],
            ["id"=>3,"name"=>"C"],
            ["id"=>4,"name"=>"C++"],
            ["id"=>5,"name"=>"Python"],
        ];
        
        foreach ($categories as $category){

            Category::create($category);
        }
    }
}
