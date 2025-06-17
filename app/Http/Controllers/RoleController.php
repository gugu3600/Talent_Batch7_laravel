<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Http\Requests\RoleUpdateRequest;
use Illuminate\Http\Request;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\Role\RoleRepository;
use Spatie\Permission\Models\Role;



class RoleController extends Controller
{
    protected $roleRepo;

    public function __construct(RoleRepository $roleRepo)

    {
        $this->roleRepo = $roleRepo;
    }
    public function index()
    {
        $roles = $this->roleRepo->index();

        return view("roles.index",compact("roles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = $this->roleRepo->create();

        return view("roles.create",compact("permissions"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $validated = $request->validated();

        $data = [
            "name" => $validated["name"],
        ];

        $role = $this->roleRepo->store($data);
        $role->permissions()->sync($validated["permissions"]);

        return redirect()->route("roles.index");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = $this->roleRepo->show($id);

        return view("roles.show",compact("role"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = $this->roleRepo->edit($id);
        $permissions = $this->roleRepo->create();

        // $userPermission = $role->permissions()->pluck("id")->toArray();

        return view("roles.edit",["role" => $role,"permissions" => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUpdateRequest $request,$id)
    {
        $role = $this->roleRepo->edit($id);
        $validated = $request->validated();

        $data = [
            "name" => $validated["name"],
        ];

        $role->update($data);
        $role->permissions()->sync($validated["permissions"]);

        return redirect()->route("roles.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = $this->roleRepo->edit($id);
        $role->delete();
        return redirect()->route("roles.index");
    }
}
