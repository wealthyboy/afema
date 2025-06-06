<?php

namespace App\Http\Controllers\Admin\Vouchers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\User;
use App\Models\Favorite;
use App\Models\Voucher;


use App\Http\Helper;


class VouchersController  extends Controller
{
   
        
		/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('admin');
	}
	

	public function index() {
		$vouchers = Voucher::all();
		return view('admin.vouchers.index',compact('vouchers'));
	}

	
	public function edit(Request $request,$id) {
		User::canTakeAction(4); 
		$voucher = Voucher::find($id);    
		return view('admin.vouchers.edit',compact('id','voucher'));
	}

	public function update(Request $request,$id){
			
		$voucher = Voucher::find($id);
		$this->validate($request, [
			'code'      => 'required|unique:vouchers,code,'.$id,
			'discount'  => 'required',
			'type'    =>'required',

		]);
		$voucher->code     = $request->code;
		$voucher->user_id  = \Auth::user()->id;
		$voucher->amount   = $request->discount;
		$voucher->type   = $request->type;
		$voucher->expires  = Helper::getFDate($request->expiry);
		$voucher->from_value = $request->has('from_value') ? $request->from_value : null;
		$voucher->category_id = $request->has('category') ? $request->category : null;
		$voucher->status =$request->status;
		$voucher->limits = $request->limits;
		$voucher->save(); 
		return redirect('admin/vouchers');
				
	}





	public function create(Request $request) {		
		return view('admin.vouchers.create');
	}
		
 


	public function store(Request $request) {

		$coupon = new Voucher();
		//VALIDATE NEW RECORDS
		$this->validate($request, [
			'code'      => 'required|unique:vouchers|max:150',
			'type'      => 'required',
			'discount'  => 'required',
		]);

		//dd($request->expiry);


		$coupon->code = $request->code; 
		$coupon->user_id = \Auth::user()->id;
		$coupon->amount = $request->discount;
		$coupon->type = $request->type;
		$coupon->expires = Helper::getFDate($request->expiry);
		$coupon->limits = $request->limits;
		$coupon->from_value = $request->has('from_value') ? $request->from_value : null;
		$coupon->status = $request->status;
		$coupon->save(); 			
		return redirect('admin/vouchers');	
	}
		
	
	public function destroy(Request $request,$id) { 
		User::canTakeAction(5);
		$rules = array(
				'_token' => 'required',
		);
		$validator = \Validator::make($request->all(),$rules);
		if ( empty ( $request->selected)) {
			$validator->getMessageBag()->add('Selected', 'Nothing to Delete');    
			return \Redirect::back()
						->withErrors($validator)
						->withInput();
		}
		Voucher::destroy($request->selected);
		return redirect()->back();
	
	}
		
		




}