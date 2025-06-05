<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $persons = [
            ["name" => "koko" , "email" => "koko@gmail.com", "address" => "Yangon","password" => "abcd1234", "gender" => "m" ,"phone" => "091234", "status" => true],

            ["name" => "hlahla" , "email" => "hlahla@gmail.com","password" => "abcd1234", "address" => "Bagan",  "gender" => "f" ,"phone" => "091234", "status" => false],

            ["name" => "mgmg" , "email" => "mgmg@gmail.com",
            "password" => "abcd1234", "address" => "Bago", "gender" => "m" ,"phone" => "091234", "status" => true],

            ["name" => "myamya" , "email" => "myamya@gmail.com","password" => "abcd1234", "address" => "Yangon", "gender" => "m" ,"phone" => "091234", "status" => false],

            ["name" => "agag" , "email" => "agag@gmail.com", "address" => "Yangon", "password" => "abcd1234", "phone" => "091234", "gender" => "m" , "status" => true],
        ];

        foreach($persons as $person){

            User::create($person);
        }


    }
}
