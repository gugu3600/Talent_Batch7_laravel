<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Services\UserServices;
use Spatie\Permission\Models\Role;




class UserController extends Controller
{

    protected $userRepo;
    protected $userServices;

    public function __construct(UserRepositoryInterface $userRepo,UserServices $userService)
    {
        $this->middleware("auth");
        $this->userRepo = $userRepo;
        $this->userServices = $userService; 
    }
    public function index()
    {
        $users = $this->userRepo->index();

        return view("users.index",["users" => $users]);
    }

    public function show($id){
        $user = $this->userRepo->show($id);

        return view("users.show",compact("user"));
    }

    public function create()
    {
       $roles = $this->userRepo->create();
        return view("users.create",compact("roles"));
    }

    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        // dd($request->img);
        $data = [
             "name" =>  $validated["name"],
            "email" => $validated["email"],
            "password" => ($validated["password"]),
            "address" => $validated["address"],
            "img" =>  $request->img,
            "status" => $validated["status"] === "on" ? true:false,
            "gender" => $validated["gender"],
            "phone" => $validated["phone"],
        ];
        $user = $this->userServices->store($data,$request);

        $user->roles()->sync($validated["roles"]);
        // dd($user->roles());
        // $user->roles()->sync($validated["roles"]);
        return redirect()->route("users");
    }

    public function edit($id)
    {
        $roles = $this->userRepo->create();
        $user = $this->userRepo->show($id);
        return view("users.edit",["user" => $user,"roles" => $roles]);
    }

    public function update($id,UsersUpdateRequest $request)
    {

        $validate = $request->validated();

         $data = [
            "name" => $validate["name"],
            "email" => $validate["email"],
            "address" => $validate["address"],
            "img" => $request->img,
            "phone" => $validate["phone"],
        ];

        $this->userServices->update($id,$request,$data,$validate);
        return redirect()->route("users");
    }

    public function delete($id)
    {
       $this->userServices->delete($id);
        // $user->delete();
        return redirect()->route("users");
    }

    public function status($id)
    {
        $this->userServices->status($id);

        return redirect()->route("users");
    }
}
