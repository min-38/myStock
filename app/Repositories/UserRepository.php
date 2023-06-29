<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Repositories\BaseRepository;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function findUser(Request $request)
    {
        $existUser = User::where('email', $request->input('email'))->first("*");
        if($existUser) {
            if(Hash::check($request->input('password'), $existUser->password)) {
                return $existUser;
            }
        }
        return false;
    }

    public function addUser(RegisterRequest $user)
    {
        $userData = array(
            'name' => $user->input('username'),
            'email' => $user->input('email'),
            'age' => $user->input('age'),
            'country' => $user->input('country'),
            'phone' => $user->input('phone'),
            'password' => $user->input('password')
        );
        
        return $this->create($userData);
    }

    public function deleteUser(String $user) {

    }

    public function signoutUSer(String $user) {

    }
}