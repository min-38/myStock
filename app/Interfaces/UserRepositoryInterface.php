<?php

namespace App\Interfaces;

use App\Models\User;
use App\Http\Requests\RegisterRequest;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
    public function addUser(RegisterRequest $user);
}