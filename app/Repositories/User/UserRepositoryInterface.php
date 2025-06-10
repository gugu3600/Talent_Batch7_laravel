<?php 

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function index();
    public function show($id);
    public function create();
    public function store($data);
    

}