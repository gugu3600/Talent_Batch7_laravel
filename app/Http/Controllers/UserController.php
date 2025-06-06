<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\UserServices;

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
        return view("users.create");
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
        $this->userServices->store($data,$request);
        return redirect()->route("users");
    }

    public function edit($id)
    {
        $user = $this->userRepo->show($id);
        return view("users.edit",["user" => $user]);
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

        $this->userServices->update($id,$request,$data);
        return redirect()->route("users");
    }

    public function delete($id)
    {
        $user = $this->userRepo->show($id);
        $user->delete();
        return redirect()->route("users");
    }

    public function status($id)
    {
        $this->userServices->status($id);

        return redirect()->route("users");
    }
}
