<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoleAPIResource;
use Illuminate\Http\Request;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Http\Controllers\API\BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;

class RoleController extends BaseController
{
    protected $roleRepo;

    public function __construct(RoleRepositoryInterface $roleRepo)
    {
        $this->roleRepo = $roleRepo;

        $this->middleware('permission:roleList', ['only' => ['index']]);
        $this->middleware('permission:roleCreate', ['only' => ['store']]);
        $this->middleware('permission:roleUpdate', ['only' => ['update']]);
        $this->middleware('permission:roleDelete', ['only' => ['destroy']]);
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
            return $this->error("Error Created New Role",$validated->errors(),422);
        }

        $data = [
            "name" => $request->name,
            "permissions" => [$request->permissions]
        ];

        $role = $this->roleRepo->store($data);
        $role->permissions()->sync($request->permissions);
        $data["permissions"] = $role->permissions()->pluck("name")->toArray();
        return $this->success($data,"Successfully Created Roles",201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = $this->roleRepo->show($id);
        
        $data = new RoleAPIResource($role);

        return $this->success($data,"Role Retrived Successfully",200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = Validator::make($request->all(),[
            "name" => "required|string",
            "permissions" => "required|exists:permissions,id",
        ]);

        if($validated->fails()){
            return $this->error("Error Created New Role",$validated->errors(),422);
        }

        $data = [
            "name" => $request->name,
            "permissions" => [$request->permissions]
            // "permissions" => [$request->permissions],
        ];

        $role = $this->roleRepo->edit($id);
        $role->update($data);
        $role->permissions()->sync($request->permissions);
        $data["permissions"] = $role->permissions()->pluck("name")->toArray();
        return $this->success($data,"updated successfully",201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = $this->roleRepo->edit($id);

        $role->delete();

        return $this->success(null,"deleted role successfully",200);
    }
}
