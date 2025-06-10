<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            "name" => "koko" , "email" => "admin@gmail.com", "address" => "Yangon","password" => "admin", "gender" => "m" ,"phone" => "091234", "status" => true]);

        $client = User::create([
            "name" => "agag" , "email" => "user@gmail.com", "address" => "Yangon","password" => "user", "gender" => "m" ,"phone" => "091234", "status" => true
        ]);

        $admin->assignRole("admin");
        $client->assignRole("client");
    }
}
