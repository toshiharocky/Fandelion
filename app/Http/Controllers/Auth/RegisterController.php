<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    protected function validator(array $request)
    {
        return Validator::make($request, [
            'memstatus_id' => ['required', 'integer', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_num' => ['required', 'string', 'max:255', 'unique:users'],
            'birthday' =>  ['required', 'date'],
            'gender' => ['required', 'string'],
            'user_icon' => ['required', 'string']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    
    
    // protected function create(array $data)
    protected function create(Request $request)
    {
        // dd($request);
        
        // $this -> validator($request->all())->validate();
        // event(new Registered($user = $this->create($request->all())));
        // $this->guard()->login($user);
        // return redirect();
        // return $this->registered($request, $user)
        //                   ?: redirect($this->redirectPath());
        
        User::create([
            
            
            'memstatus_id' => $request['memstatus_id'],
            'user_icon' => $request['user_icon'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone_num'=> $request['phone_num'],
            'birthday' => $request['birthday'],
            'gender' => $request['gender'],
            
            // 'memstatus_id' => $data['memstatus_id'],
            // 'user_icon' => $data['user_icon'],
            // 'name' => $data['name'],
            // 'email' => $data['email'],
            // 'password' => Hash::make($data['password']),
            // 'phone_num'=> $data['phone_num'],
            // 'birthday' => $data['birthday'],
            // 'gender' => $data['gender'],
        ]);
        
        return view('auth/login');
    }
}
