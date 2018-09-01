<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Validator;
use Hash;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function postSignin(Request $request) {
        $rules = [
            'email' => 'required', // exists:table,column (필드의 값이 주어진 데이터베이스 테이블에 존재하는 값이어야함.)
            'password' => 'required|min:5',
        ];
        
        $messages = [
            'email.required' => '이메일 입력은 필수입니다.',
            'password.min' => '비밀번호는 최소 5자리 입니다.',
            'password.required' => '비밀번호 입력은 필수입니다.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) 
            return redirect('account')->withErrors($validator)->withInput();
        
        $user = User::where('email', $request->input('email'))->first();
            
        if(!$user)
            return redirect('/');
        if (!Hash::check($request->input('password'), $user->password)) {
            return redirect('account')->with('no-password', '비밀번호가 일치하지 않습니다.')->withInput();
        }
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->intended('/');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }
}
