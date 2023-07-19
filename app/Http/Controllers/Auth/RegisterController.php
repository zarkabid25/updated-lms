<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use \Spatie\Permission\Models\Role;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function redirectTo()
    {
        if(Session::has('url.intended'))
            return Session::get('url.intended');
        else{
            return '/home';
        }
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
            'name' => 'required|string|between:3,20',
            'email' => 'unique:users,email',
            'phone' => 'required|integer',
            'password' => 'required|min:6|string',
            'role' => 'required|in:2,3',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $data['status'] = '1';
        $data['password'] = bcrypt($data['password']);

        $role = $data['role'];
        unset($data['role']);
        $user = User::create($data);

        $role = Role::find($role);
        $user->assignRole($role->name);
        return $user;


//        $data['status'] = '1';
//        $data['password'] = bcrypt($data['password']);
//
//        $user = User::create($data);
//
//        $role = Role::find($data['role']);
//        $user->assignRole($role->name);
//        return $user;
    }
}
