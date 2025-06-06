<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Http\Flash;
use App\Models\State;


use Illuminate\Support\Facades\Validator;
use App\Models\Permission;


class UsersController extends Controller
{


	public function __construct()
	{
		// $this->middleware('auth');
		$this->middleware('admin');
	}
	/* display all users in the database */
	public function index(Request $request)
	{
		$users = User::admin()->get();

		return view('admin.users.index', compact('users'));
	}

	/* display all users in the database */
	public function edit(Request $request, $id)
	{
		$user = User::find($id);
		$permissions = Permission::get();
		return view('admin.auth.edit', compact('permissions', 'user'));
	}


	public function logout(Request $request)
	{
		\Auth::logout();
		return redirect('/admin/login');
	}


	public function show($id)
	{
		$user = User::find($id);
		return view('admin.customers.show', compact('user', 'permissions'));
	}


	public function create(Request $request)
	{
		//User::canTakeAction(2);
		$permissions = Permission::get();
		return view('admin.auth.register', compact('permissions'));
	}




	protected function store(Request $request)
	{

		$this->validate($request, [
			'first_name' => 'required|max:255',
			'email' => 'required|email|max:255',
		]);


		$user  = new User;
		$user->name = $request->first_name;
		$user->last_name = $request->last_name;
		$user->email = $request->email;
		$user->phone_number = $request->phone_number;
		$user->type = $request->has('is_agent') ? "agent" : null;
		$user->password = $request->has('password') ? bcrypt($request->password) : $user->password;
		$user->save();

		$user->users_permission()->create([
			'permission_id' => $request->permission_id
		]);

		return redirect('/admin/users');
	}


	protected function update($id, Request $request)
	{

		$this->validate($request, [
			'first_name' => 'required|max:255',
			'email' => 'required|email|max:255',
		]);

		$user  = User::find($id);
		$user->name = $request->first_name;
		$user->last_name = $request->last_name;
		$user->email = $request->email;
		$user->phone_number = $request->phone_number;
		$user->type = $request->has('is_agent') ? "agent" : null;
		$user->password = $request->has('password') ? bcrypt($request->password) : $user->password;
		$user->save();

		$user->users_permission()->update([
			'permission_id' => $request->permission_id
		]);

		return redirect('/admin/users');
	}

	public function destroy(Request $request)
	{
		$rules = array(
			'_token' => 'required',
		);

		$validator = \Validator::make($request->all(), $rules);

		if (empty($request->selected)) {
			$validator->getMessageBag()->add('Selected', 'Nothing to Delete');
			return \Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		User::destroy($request->selected);
		return redirect()->back();
	}

	public function delete(Request $request)
	{
		User::canTakeAction(5);
		if ($request->isMethod('post')) {
			$rules = array(
				'_token' => 'required',
			);
			// dd(get_class(\new Validator));
			$validator = \Validator::make($request->all(), $rules);
			if (empty($request->selected)) {
				$validator->getMessageBag()->add('Selected', 'Nothing to Delete');
				return \Redirect::back()
					->withErrors($validator)
					->withInput();
			}
			User::destroy($request->selected);
			$flash = app('App\Http\Flash');
			$flash->success("Success", "Users Deleted");
			return redirect()->back();
		}

		User::destroy($request->selected);
		$flash = app('App\Http\flash');
		$flash->success("Success", "User Deleted");
		return redirect()->back();
	}
}
