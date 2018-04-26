<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use App\Model\ClientFreelancer;
use DB;
use Mail;

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
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $request)
    {

        return Validator::make($request, [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'role_id' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6|same:password',
            // 'location' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $request
     * @return User
     */

    // protected function create(array $data)
    // {
    //     $urole = $data['urole'];
    //     $fullname = $data['first_name'] .' '.$data['last_name'];

    //     return User::create([
    //         'name' => $fullname,
    //         'username' => $data['username'],
    //         'email' => $data['email'],
    //         'role_idg' => $urole,
    //         'password' => bcrypt($data['password']),
    //     ]);
    // }

    public function register(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'urole' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|same:password',
            'privacy' => 'required',
        ]);

       // dd($request->all());

        $urole = $request->urole;
        $fullname = $request->first_name .' '.$request->last_name;
        $url = $request->currenturl;
        // $latlong = $request->geolocation;
        $user = new User;

        $user->name = $fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role_idg = $urole;
        $user->password = bcrypt($request->password);
        $user['link'] = str_random(30);  
        if($user->save()){
            $freeclient = new ClientFreelancer;
            $freeclient->user_idu = $user->id;
            $freeclient->name = $fullname;
            $freeclient->username = $request->username;
            $freeclient->email = $request->email;
            $freeclient->role_idu = $urole;
            // $freeclient->location = $latlong;
            $freeclient->save();
        }else{

        }

        if($user->save()){
            if($urole == 2){
            $user->assignRole('Client');
            if($urole == 2){
                    $username = Auth::guard('web')->attempt(['username'=>$request->emailuser,'password'=>$request->password,]);
                    $emailuse = Auth::guard('web')->attempt(['email'=>$request->emailuser,'password'=>$request->password,]);
                    if($username || $emailuse){

                        if(Auth::user()->role_idg == 2){
                           return redirect()->route('client');
                        }else{
                            return redirect()->route('freelancer');
                        }
                    }
                }else{
                    return redirect()->route($url);
                }
                
        }elseif($urole == 3){
            $user->assignRole('Freelancer');
                if($urole == 3){
                    $username = Auth::guard('web')->attempt(['username'=>$request->emailuser,'password'=>$request->password,]);
                    $emailuse = Auth::guard('web')->attempt(['email'=>$request->emailuser,'password'=>$request->password,]);
                    if($username || $emailuse){

                        if(Auth::user()->role_idg == 3){
                           return redirect()->route('freelancer');
                        }else{
                            return redirect()->route('client');
                        }
                    }
                }else{
                    return redirect()->route($url);
                }
        }else{
            $user->assignRole('Admin');
                if($urole == 1){
                    $username = Auth::guard('web')->attempt(['username'=>$request->emailuser,'password'=>$request->password,]);
                    $emailuse = Auth::guard('web')->attempt(['email'=>$request->emailuser,'password'=>$request->password,]);
                    if($username || $emailuse){

                        if(Auth::user()->role_idg == 1){
                           return redirect()->route('dashboard');
                        }else{
                            return redirect()->route($url);
                        }
                    }
                }else{
                    return redirect()->route($url);
                }
        }
        }else{
            return redirect()->route($url);
        }

        $user = User::find($user['id'])->toArray();


        DB::table('user_activations')->insert(['id_user'=>$user['id'],'token'=>$user['link']]);
        Mail::send('auth.emails.activation', $user, function($message) use ($user) {
            //dd($message);
            $message->to($user['email']);
            $message->subject('great-neighbor.com - Activation Code');
        });

        return redirect()->route('login')->with('success', 'We sent activation code ! Please check your email !');


        //return redirect()->route('login')->with('success', 'You have been Successfully SignUp ! Please Login with valid information!');
    }  

    //return back()->with('errors', $validator->errors());  

    public function userActivation($token)
    {
        $check = DB::table('user_activations')->where('token', $token)->first();

        if(!is_null($check)){
            $user = User::find($check->id_user);
            if ($user->is_activated == 1) {
                return redirect()->route('login')->with('success', 'User are already activated !');
            }

            $user->update(['is_activated' => 1]);
            DB::table('user_activations')->where('token', $token)->delete();
            return redirect()->route('login')->with('success', 'User activated Successfully!');
        }else{
            return redirect()->route('login')->with('warning', 'Your token is invalid!');
        }
    }
    
    
}
