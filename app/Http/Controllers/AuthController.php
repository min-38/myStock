<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Interfaces\UserRepositoryInterface;
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
        if($user) {

            // 회원가입 성공 시
            return response()->json(array(
                'success' => true,
                'msg'   => "회원가입이 되셨습니다. 로그인해주세요.",
                'redirectUrl'   => "/login",
            ));
        }
        


        // return view('tasks.edit', ['task' => $task]);
    }
}
