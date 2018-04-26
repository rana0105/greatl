<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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

    
        // if(Auth::users()->role_idg == 1){
        //     protected $redirectTo = '/dashboard';
        // }else{
        //     protected $redirectTo = '/index';
        // }

       // protected $redirectTo = '/dashboard';
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'emailuser' => 'required',
            'password' => 'required',
            ],[
            'emailuser.required' => 'Email or Username not matched with Database!',
            'password.required' => 'Password not matched with Database!',
            ]);

        $checkUserInput = filter_var($request->input('emailuser'), FILTER_VALIDATE_EMAIL)?'email': 'username';
        $user = Auth::guard('web')->attempt([$checkUserInput => $request->emailuser,'password'=>$request->password]);
        if($user == 'true'){
            if(Auth::user()->is_activated == 1){
                if(Auth::user()->role_idg == 1)
                    return redirect()->route('dashboard');
                return redirect()->route('home.home');
             }
            else{
                return redirect()->route('login')->with(Auth::logout())->with('error', 'User Email have not activated !');
            }
        }else{
            return redirect()->route('login')->with('error', 'Whoops! Wrong Email or Username or Password !');
        }
    }

     public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
