<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Notifications\NewUserRegistered;
use App\Models\User;

class NewMembersControllers extends Controller
{

    public $setting;

    public function __construct()
    {
        $this->setting = Setting::first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('members.index');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();



        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'phone_number' => ['required', 'string', 'max:20', 'unique:users,phone_number'],
            'date_of_birth' => ['required'],
            'preferred_way_to_contact'  => ['required'],
        ]);

        $user = User::create([
            'name' => data_get($data, 'name'),
            'last_name' => data_get($data, 'last_name'),
            'email' => data_get($data, 'email'),
            'phone_number' => data_get($data, 'phone_number'),
            'type' => 'subscriber',
            'dob' => data_get($data, 'dob'),
            'preferred_way_to_contact' => data_get($data, 'preferred_way_to_contact'),
            'password' => \Hash::make(112233),
        ]);

        $user->notify(new NewUserRegistered($user));

        \Notification::send($this->setting->email, new NewUserRegistered($user));

        return redirect()->back()->with('success', 'Registration successful! Welcome to the Afemai Association of Canada. We’re excited to have you on board.');


        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
