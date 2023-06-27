<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

use App\Http\Requests\RegisterRequest;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
    public function findUser(Request $user);
    public function addUser(RegisterRequest $user);
    public function deleteUser(String $user);
    public function signoutUSer(String $user);
}