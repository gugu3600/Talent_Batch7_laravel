<?php 

namespace App\Repositories\User;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRepository implements UserRepositoryInterface
{

    public function index()
    {
       return User::with("roles")->get();
    }

    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function create()
    {
        $roles = Role::all();
        return $roles;
    }

    public function store($data)
    {
         return User::create($data);
    }
}