<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoleAPIResource;
use Illuminate\Http\Request;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Http\Controllers\API\BaseController;
use Illuminate\Support\Facades\Validator;

class RoleController extends BaseController
{
    protected $roleRepo;

    public function __construct(RoleRepositoryInterface $roleRepo)
    {
        $this->roleRepo = $roleRepo;
    }
    public function index()
    {
        $roles = $this->roleRepo->index();
        $data = RoleAPIResource::collection($roles);

        return $this->success($data,"Roles Retrived Success",200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            "name" => "required|string",
            "permissions" => "required|exists:permissions,id"
        ]);

        if($validated->fails()){
            return $this->error("Error Created New Role",$validated->errors(),418);
        }

        $data = [
            "name" => $request->name,
            "permissions" => $request->permissions
        ];

        $role = $this->roleRepo->store($request->all());
        $role->permissions()->sync([$request->permissions]);
        return $this->success($data,"Successfully Created Roles",200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
