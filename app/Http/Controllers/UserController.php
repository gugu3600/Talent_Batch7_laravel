<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UsersUpdateRequest;
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

        // dd($request->all());
        

        if($request->hasFile("img")){

            $getName = time() . ".jpg";
            $request->img->move(public_path("userImages"),$getName);
            $request->img = $getName;
        }

        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "address" => $request->address,
            "img" => $request->img,
            "phone" => $request->phone,
            "gender" => $request->gender,
            "status" => $request->status == "on" ? true : false ,
        ];

        // dd($data);

        $this->userRepo->store($data);
        return redirect()->route("users");
    }

    public function edit($id)
    {
        $user = $this->userRepo->show($id);
        return view("users.edit",["user" => $user]);
    }

    public function update($id,UsersUpdateRequest $request)
    {

        $user = $this->userRepo->show($id);


        if($request->hasFile("img")){

            $getName = time() . ".jpg";
            $request->img->move(public_path("userImages"),$getName);
            $request->img = $getName;
        }


         $data = [
            "name" => $request->name,
            "email" => $request->email,
            "address" => $request->address,
            "img" => $request->img,
            "phone" => $request->phone,
            "status" => $request->status == "on" ? true : false ,
        ];

        $user->update($data);
        return redirect()->route("users");
    }

    public function delete($id)
    {
        $user = $this->userRepo->show($id);
        $user->delete();
        return redirect()->route("users");
    }


}
