<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Setting extends Model
{
	//alllow these to be mass assigned

	use HasFactory;


	public $timestamps = false;

	protected $fillable = [
		'site_name',
		'address',
		'email',
		'phone',
		'image',
		'meta_title',
		'meta_description',
		'meta_tag_keywords',
		'alert_email',
		'facebook_link',
		'instagram_link',
		'twitter_link',
		'youtube_link',
		'logo',
		'icon',
		'pdf_path'

	];




	public function alert_email()
	{
		return $this->alert_email;
	}

	public function logo_path()
	{
		return '/images/logo/' . $this->store_logo;
	}

	public function currency()
	{
		if ($this->customer_currency_id !== null) {
			return  $this->belongsTo(Currency::class, 'customer_currency_id');
		}
		return  $this->belongsTo(Currency::class);
	}


	public function default_currency()
	{
		return  $this->belongsTo(Currency::class, 'currency_id');
	}
}
