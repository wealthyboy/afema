<?php

namespace App\Http\Controllers\Information;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Information;
use App\Models\User;

use Auth;
use App\Http\Helper;
use Illuminate\Validation\Rule;


class InformationController extends Controller
{
	//where we display art collection

	public function __construct()
	{
		$this->middleware('admin', ['except' => ['show']]);
	}

	public function  index(Request $request)
	{


		$pages = Information::orderBy('title', 'asc')->get();
		return view('admin.information.index', compact('pages'));
	}

	public function  create(Request $request)
	{
		//User::canTakeAction(2);
		$pages = Information::parents()->get();
		return view('admin.information.create', compact('pages'));
	}

	public function  store(Request $request)
	{


		$this->validate($request, [
			'title' => 'required|unique:informations|max:100',
		]);
		$info = new Information;
		$input = $request->all();
		$info->title = $request->title;
		$info->description = $request->description;
		$info->sort_order = $request->sort_order;
		$info->custom_link = $request->custom_link;
		$info->image = $request->image;
		$info->same_page = $request->same_page == 'yes' ? true : false;
		$info->parent_id = $request->parent_id ? $request->parent_id : 0;
		$info->slug = str_slug($request->title);
		$info->save();
		return redirect()->route('pages.index')->with('status', 'created');
	}


	public function update(Request $request, $id)
	{

		$page = Information::find($id);
		if ($request->filled('parent_id')) {
			$this->validate($request, [
				'title' => [
					'required',
					Rule::unique('informations')->where(function ($query) use ($request) {
						$query->where('parent_id', '=', $request->parent_id);
					})->ignore($id)

				],
			]);
		}
		$this->validate($request, [
			'title' => [
				'required',
				Rule::unique('informations')->ignore($id),
			],
		]);
		$page->title = $request->title;
		$page->description = $request->description;
		$page->sort_order = $request->sort_order;
		$page->custom_link = $request->custom_link;
		$page->image = $request->image;
		$page->same_page = $request->same_page == 'yes' ? true : false;
		$page->parent_id = $request->parent_id ? $request->parent_id : 0;
		$page->slug = str_slug($request->title);
		$page->save();
		return redirect()->route('pages.index')->with('status', 'created');
	}


	public function  edit(Request $request, $id)
	{
		//User::canTakeAction(4);
		$information = Information::find($id);
		$pages = Information::get();
		return view('admin.information.edit', compact('information', 'pages'));
	}


	public function  show(Request $request, Information $information)
	{
		$page_title = $information->name;
		return view('pages.index', compact('information', 'page_title'));
	}



	public function  destroy(Request $request, $id)
	{

		//User::canTakeAction(5);
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
		Information::destroy($request->selected);
		return redirect()->back()->with('status', 'removed');
	}
}
