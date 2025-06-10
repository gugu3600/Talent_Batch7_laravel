<?php 

namespace App\Repositories\Role;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleRepository implements RoleRepositoryInterface
{

    public function index()
    {
        $roles = Role::all();
        return $roles;
    }

    public function create()
    {
        $permissions = Permission::all();
        return $permissions;
    }

    public function store($data)
    {
        return Role::create($data);
    }

    public function show($id)
    {
        return Role::with("permissions")->find($id);
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return $role;
    }
}