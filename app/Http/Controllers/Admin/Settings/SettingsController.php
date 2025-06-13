<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;

use App\Http\Requests\SystemSettingsRequest;

use App\Models\Setting;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Flash;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Currency;
use App\Models\Payment;



class SettingsController extends Controller
{
	//


	public function __construct()
	{
		$this->middleware('admin');
	}

	public function index()
	{
		$settings = Setting::all();
		return view('admin.settings.index', compact('settings'));
	}


	public function create()
	{
		$currencies = collect(['name' => 'jacob']);
		return view('admin.settings.create', compact('currencies'));
	}





	public function edit($id)
	{
		//User::canTakeAction(4);
		$setting = Setting::find($id);
		$currencies = collect(['name' => 'jacob']);
		return view('admin.settings.edit', compact('setting', 'currencies'));
	}



	public function update(Request $request, $id)
	{
		$setting = Setting::find($id);
		$file_logo = '';
		$logo = '';

		$input = $request->all();


		if ($request->file('image')) {
			$file_logo = $request->file('image');
			$originalName = $file_logo->getClientOriginalName();
			$filename =  time() . '_' . preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $originalName);
			$file_logo->move(public_path('images/logo'), $filename);

			$input['logo'] = '/images/logo/' . $filename;
			$input['icon'] = '/images/logo/' . $filename;
		}


		if ($request->hasFile('pdf')) {
			$file = $request->file('pdf');
			$originalName = $file->getClientOriginalName();
			$filename =  time() . '_' . preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $originalName);

			// Move file to public/pdf directory
			$file->move(public_path('pdf'), $filename);


			// Store relative path in database
			$input['pdf_path'] = 'pdf/' . $filename;
		}




		$setting->update($input);

		return \Redirect::to('/admin/settings');
	}


	public function store(Request $request)
	{
		//Check the databse for the owner
		$ip = $_SERVER['REMOTE_ADDR'];

		$input = $request->all();


		if ($request->file('image')) {
			$file_logo = $request->file('image');
			$logo = !empty($file_logo->getClientOriginalName()) ?  time() . $file_logo->getClientOriginalName() :  '';
			$file_logo->move('images/logo', $logo);
			$input['store'] = $logo;
		}


		if ($request->file('pdf')) {
			$file_logo = $request->file('pdf');
			$pdf = !empty($file_logo->getClientOriginalName()) ? time() . $file_logo->getClientOriginalName() :  '';
			$file_logo->move('pdf/logo', $logo);
			$settings->store_logo = $logo;
			$settings->store_icon =  $logo;
		}
		$settings->store_logo = $logo;
		$settings->store_icon =  $logo;
		$settings->image =  null;

		return \Redirect::to('/admin/settings');
	}
}
