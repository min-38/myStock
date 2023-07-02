<?php

namespace App\Http\Controllers;

// Illuminate
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Interfaces\UserRepositoryInterface;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    private UserRepositoryInterface $userRepositoryInterface;

    protected $redirectTo = RouteServiceProvider::LOGIN;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->middleware('guest')->except('logout');
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    // 계정 생성
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ], [
            'email' => '이메일을 입력해주세요.',
            'password' => '패스워드를 입력해주세요.'
        ]);

        $user = $this->userRepositoryInterface->findUser($request);

        $msg = "아이디 또는 패스워드가 맞지 않습니다.\n다시 확인해 주세요.";
        $redirectUrl = "";

        if($user) {
            // 로그인 성공 시
            $msg = "로그인 되었습니다.";
            $redirectUrl = "/dashboard";
        }

        return response()->json(array(
            'success'       => $user ? true : false,
            'msg'           => $msg,
            'redirectUrl'   => $redirectUrl,
        ));
    }

    // 계정 생성
    public function create(RegisterRequest $request)
    {
        $state = $this->userRepositoryInterface->addUser($request);
        if($state) {
            // 회원가입 성공 시
            return response()->json(array(
                'success' => true,
                'msg'   => "회원가입이 되셨습니다. 로그인해주세요.",
                'redirectUrl'   => "/login",
            ));
        }
    }

    public function logout() {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }
}
