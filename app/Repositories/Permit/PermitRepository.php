<?php 

namespace App\Repositories\Permit;

use App\Repositories\Permit\PermitRepositoryInterface;
use Spatie\Permission\Models\Permission;

class PermitRepository implements PermitRepositoryInterface
{
    public function index()
    {
        return Permission::all();
    }

    public function store($data)
    {
        return Permission::create($data);
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return $permission;
    }
}