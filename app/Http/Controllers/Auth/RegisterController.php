<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Input;
use DB;
use Validator;

use App\User;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    public function postSignup(Request $request) {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:5',
            'phone' => 'required|numeric|min:11'
        ];
    
        $messages = [
            'name.required' => '이름을 입력 해주세요!',
            'email.required' => '이메일은 필수입니다.',
            'phone.required' => '폰번호는 필수입니다.',
            'password.confirmed' => '비밀번호가 다릅니다',
            'password.required' => '비밀번호를 입력해주세요',
            'password.min' => '비밀번호는 최소 5글자 입니다.'
        ];

        
        $validator = Validator::make($request->all(), $rules, $messages);
		if($validator->fails()) 
            return redirect('account')->withErrors($validator)->withInput();

        $userArray = $request->all();
        $userArray['password'] = bcrypt($userArray['password']);
        $user = User::create($userArray);
        
        return redirect('success/signup');
    }
}
