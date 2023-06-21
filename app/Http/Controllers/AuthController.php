<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    private UserRepositoryInterface $userRepositoryInterface;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->middleware('guest')->except('logout');
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    // 계정 생성
    public function create(RegisterRequest $request)
    {
        $user = $this->userRepositoryInterface->addUser($request);
        


        // return view('tasks.edit', ['task' => $task]);
    }
}
