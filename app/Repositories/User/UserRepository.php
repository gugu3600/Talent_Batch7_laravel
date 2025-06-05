<?php 

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{

    public function index()
    {
       return User::all();
    }

    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function store($data)
    {
         return User::create($data);
    }

}