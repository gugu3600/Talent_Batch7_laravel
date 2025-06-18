<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\UserAPIResource;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\UserServices;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    protected $userRepo;
    protected $userService;

    public function __construct(UserRepositoryInterface $userRepo,UserServices $userService)
    {
        $this->userRepo = $userRepo;
        $this->userService = $userService;

        $this->middleware('permission:userList', ['only' => ['index']]);
        $this->middleware('permission:userCreate', ['only' => ['store']]);
        $this->middleware('permission:userUpdate', ['only' => ['update']]);
        $this->middleware('permission:userDelete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $users = $this->userRepo->index();
        $data = UserAPIResource::collection($users);

        return $this->success($data,"Users Retrived Successfully",200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            "name" => "string|required",
            "email" => "required",
            "password" => "required",
            "address" => "required",
            "img" => "nullable",
            "gender" => "required",
            "phone" => "required"
        ]);

        if($validated->fails()){
            return $this->error("User Create Failed",$validated->errors(),422);
        }

        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "address" => $request->address,
            "img" => $request->img,
            "status" => $request->status,
            "gender" => $request->gender,
            "phone" => $request->phone,
            "roles" => $request->roles
        ];

        // dd($data);

        $user = $this->userService->store($data,$request);

        // dd($user);

        $user->roles()->sync($request["roles"]);

        // $imgName = $request->name . time() . ".jpg";

        // $data["img"] = $imgName;

        return $this->success($user,"User Created Successfully",201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->userRepo->show($id);

        $data = new UserAPIResource($user);

        return $this->success($data,"User Retrived Successfully",200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = Validator::make($request->all(),[
             "name" => "string|required",
            "email" => "required",
            "address" => "required",
            "img" => "nullable",
            "gender" => "required",
            "phone" => "required"
        ]);

        $data = $request->all();

        $this->userService->update($id,$request,$data);

        $user = $this->userRepo->show($id);

        return $this->success($user,"User Updated Successfully",201); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userService->delete($id);
        return $this->success(null,"User Deleted Successfully",200);
    }
}
