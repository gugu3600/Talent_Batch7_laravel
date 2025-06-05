<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\User\UserRepository;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
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
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "img" => $request->img,
            "phone" => $request->phone,
            "gender" => $request->gender,
            "address" => $request->address,
            "status" => $request->status == "on" ? true : false ,
        ];

        if($request->hasFile("img")){

            $getName = time() . ".jpg";
            $request->img->move(public_path("userImages"),$getName);
            $data = array_merge($data,["img" => $getName]);
        }

        $this->userRepo->store($data);
        return redirect()->route("users");
    }

    public function edit($id)
    {
        $user = $this->userRepo->show($id);
        return view("users.edit",["user" => $user]);
    }

    public function update($id,UserRequest $request)
    {
        //
    }

    public function delete()
    {
        //
    }


}
