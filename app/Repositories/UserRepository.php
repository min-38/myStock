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
        return $model->create($user);
    }
}