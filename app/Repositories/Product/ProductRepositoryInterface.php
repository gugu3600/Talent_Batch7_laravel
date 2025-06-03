<?php 

namespace App\Repositories\Product;

interface ProductRepositoryInterface 
{
    public function index();
    public function create();
    public function store($data);
    public function find($id);
}