<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create(array $data)
    {
        User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect(Route('home'));
    }

    public function showPasswordForm()
    {
        return view('auth.password');
    }

    public function password(Request $request)
    {
        Validator::extend('old_password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, current($parameters));
        });

        $this->Validate($request,[
            'old_password' => 'required|old_password:' . Auth::user()->password,
            'password' => 'string|min:6|confirmed'
        ]);

        $user = User::FindOrFail(Auth::user()->id);
        $user->password = bcrypt($request['password']);
        $user->save();
        return redirect(route('home'));
    }

    public function delete(Request $request)
    {
        $user = User::FindOrFail($request->id);
        $user -> delete();
        return back();
    }
}
