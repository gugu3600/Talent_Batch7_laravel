<?php 

namespace App\Repositories\Role;

interface RoleRepositoryInterface
{
    public function index();
    public function create();
    public function store($data);
    public function show($id);
    public function edit($id);
} 