<?php 

namespace App\Repositories\Permit;

use Spatie\Permission\Models\Permission;

interface PermitRepositoryInterface
{
    public function index();
    public function store($data);
    public function edit($id);
}