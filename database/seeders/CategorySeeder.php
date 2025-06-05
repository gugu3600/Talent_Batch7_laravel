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
            ["id"=>1,"name"=>"Fashion"],
            ["id"=>2,"name"=>"IT"],
            ["id"=>3,"name"=>"Safety"],
            ["id"=>4,"name"=>"Health and Fitness"],
            ["id"=>5,"name"=>"Sport"],
        ];
        
        foreach ($categories as $category){

            Category::create($category);
        }
    }
}
