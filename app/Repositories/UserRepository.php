<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        parent::__construct($model);
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
}