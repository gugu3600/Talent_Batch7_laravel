<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(["name" => "admin"]);
        $client = Role::create(["name" => "client"]);

        $categoryList = Permission::create(["name" => "categoryList"]);
        $categoryCreate = Permission::create(["name" => "categoryCreate"]);
        $categoryUpdate = Permission::create(["name" => "categoryUpdate"]);
        $categoryDelete = Permission::create(["name" => "categoryDelete"]);

        $admin->givePermissionTo([
            $categoryList,
            $categoryCreate,
            $categoryUpdate,
            $categoryDelete
        ]);

        $client->givePermissionTo([
            $categoryList
        ]);
    }
}
