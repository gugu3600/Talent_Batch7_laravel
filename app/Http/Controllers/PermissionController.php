<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Repositories\Permit\PermitRepository;
use Illuminate\Http\Request;
use App\Repositories\Permit\PermitRepositoryInterface;
use App\Http\Requests\PermissionUpdateRequest;


class PermissionController extends Controller
{
    protected $permitRepo;

    public function __construct(PermitRepositoryInterface $permitRepo)
    {
        $this->permitRepo = $permitRepo;
    }
    public function index()
    {
        $permissions = $this->permitRepo->index();

        return view("permissions.index",compact("permissions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("permissions.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        $validated = $request->validated();

        $this->permitRepo->store($validated);

        return redirect()->route("permissions.index");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $permission = $this->permitRepo->edit($id);

        return view("permissions.edit",compact("permission"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionUpdateRequest $request,$id)
    {
        $validated = $request->validated();

        $permission = $this->permitRepo->edit($id);

        $permission->update($validated);

        return redirect()->route("permissions.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $permission = $this->permitRepo->edit($id);

        $permission->delete();

        return redirect()->route("permissions.index");

    }
}
