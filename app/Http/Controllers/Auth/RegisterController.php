<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Notifications\UserRegisteredNotification;


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
    protected $redirectTo = "/register";

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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'max:20', 'unique:users'],
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

        $data = $request->validate([
            'name'                      => ['required', 'string', 'max:255'],
            'last_name'                 => ['required', 'string', 'max:255'],
            'email'                     => ['required', 'email', 'max:255', 'unique:users,email'],
            'phone_number'              => ['nullable', 'string', 'max:20'],
            'dob'                       => ['nullable', 'date'],
            'preferred_way_to_contact'  => ['nullable', 'in:email,phone,sms'],
            // If you’d like the user to supply a password, add:
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);



        $user = User::create([
            'name' => data_get($data, 'name'),
            'last_name' => data_get($data, 'last_name'),
            'email' => data_get($data, 'email'),
            'phone_number' => data_get($data, 'phone_number'),
            'type' => 'subscriber',
            'dob' => data_get($data, 'dob'),
            'preferred_way_to_contact' => data_get($data, 'preferred_way_to_contact'),
            'password' => Hash::make(112233),
        ]);

        //  $user->notify();

        $user->notify(new UserRegisteredNotification());


        return $user;
    }




    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {

        if ($request->ajax()) {
            return response()->json([
                'loggenIn' => true,
                'user_type' => 'registered',
                'user' => $user
            ], 200);
        }

        auth()->logout();
        return redirect()->intended($this->redirectPath())->with('success', 'Registration successful! Welcome to the Afemai Association of Canada. We’re excited to have you on board.');
    }


    public function verify(Request $request)
    {
        return view('auth.verify');
    }
}
