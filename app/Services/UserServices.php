<?php 

namespace App\Services;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserServices
{

    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepo = $userRepository;   
    }

    public function store($data,$request)
    {
        
        // dd($request);
        if($request->hasFile("img")){

            $imgName = $data["name"] . time() . ".jpg";
            $request->img->move(public_path("userImages"),$imgName);
            $data["img"] = $imgName;
        }

            $data["password"] = Hash::make($data["password"]);

        // print_r($data);
        return $this->userRepo->store($data);
    }

    public function update($id,$request,$data)
    {
       $user =  $this->userRepo->show($id);
       $path = public_path("userImages");

       if($request->hasFile("img") and File::exists($path . "/$user->img")){
        File::delete($path . "/$user->img");
        $imgName = $data["name"] . time() . ".jpg";
        $request->img->move(public_path("userImages"),$imgName);
        $data["img"] = $imgName;
       }

       return $user->update($data);
    }

    public function delete($id)
    {
        $user = $this->userRepo->show($id);
        $path = public_path("userImages");

        if(File::exists($path . "/$user->img")){
            File::delete($path . "/$user->img");
        }

        return $user->delete();
    }

    public function status($id)
    {
        $user = $this->userRepo->show($id);

        $user->status = $user->status === 1 ? 0 : 1;
        $user->save();
    }
}