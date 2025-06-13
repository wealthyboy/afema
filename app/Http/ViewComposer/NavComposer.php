<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;

use Auth;
use App\Models\User;

use App\Models\Information;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Voucher;
use App\Models\Promo;
use App\Models\Currency;
use App\Models\Property;
use App\Models\PeakPeriod;

use App\Http\Helper;




use Illuminate\Support\Facades\Cache;

class   NavComposer
{


	public function compose(View $view)
	{
		$footer_info = Information::parents()->get();
		$system_settings = Setting::first();

		$view->with([
			'footer_info' => $footer_info,
			'system_settings' => $system_settings,
		]);
	}
}
