<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PermissionAPIResource;
use Illuminate\Http\Request;
use App\Repositories\Permit\PermitRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class PermissionController extends BaseController
{
    protected $permissionRepo;

    public function __construct(PermitRepositoryInterface $permissionRepo)
    {
        $this->permissionRepo = $permissionRepo;
    }
    public function index()
    {
        $permits = $this->permissionRepo->index();

        $data = PermissionAPIResource::collection($permits);

        return $this->success($data,"Permission Retrived Successfully",200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            "name" => "required|string"
        ]);

        if($validated->fails()){

            return $this->error("Permission created failed",$validated->errors(),422);
        }

        $data = ["name" => $request->name];

        $this->permissionRepo->store($request->all());
        

        return $this->success($data,"Permissions Created Successfully",201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permission = $this->permissionRepo->edit($id);
        $data = new PermissionAPIResource($permission);

        return $this->success($data,"Permission Retrive Successfully",200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = Validator::make($request->all(),[
            "name" => "required|string"
        ]);

        if($validated->fails()){
            return $this->error("Permission Created failed",$validated->errors(),422);
        }

        $data = ["name" => $request->name];
        $permission = $this->permissionRepo->edit($id);

        $permission->update($request->all());

        return $this->success($data,"Permission Updated Successfully",201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = $this->permissionRepo->edit($id);

        $permission->delete();

        return $this->success(null,"Permission Deleted Successfully",200);
    }
}
