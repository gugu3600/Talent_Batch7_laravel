<?php

namespace Database\Seeders;

use App\Models\Articles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            ["name"=> "Comic"],
            ["name"=> "News"],
            ["name"=> "Sports"],
            ["name"=> "IT"],
            ["name"=> "Manga"]
        ];

        foreach($articles as $article){
            Articles::create($article);
        }
    }
}
