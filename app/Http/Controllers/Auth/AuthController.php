<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */

     protected $redirectTo ='';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */

    //NAO FUNCIONA ISTO -- A IDEIA ERA FICAR NA MESMA PAGINA QUANDO FAZES LOGOUT
    public function getLogout()
    {
        auth()->logout();
        return redirect(session()->pull('from',$this->redirectTo));
    }
    public function __construct()

    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    //THIS 2 FUNCIONTS WHRE JUST ADDED TO MAKE THE USER BE REDIRECTED TO THE PAGE WHERE HE CLICKED HE LOG IN BUTTON.
    public function showLoginForm()
    {
        if(!session()->has('from')){
            session()->put('from', url()->previous());
        }
        return view('auth.login');
    }

    public function authenticated($request,$user)
    {
        return redirect(session()->pull('from',$this->redirectTo));
    }


}
