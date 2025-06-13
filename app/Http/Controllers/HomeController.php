<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Live;
use App\Models\Information;
use App\Models\Event;

use App\Models\Banner;



class HomeController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {


        $site_status = Live::first();
        $banners =  Banner::banners()->get();


        if (!$site_status->make_live) {
            return view('index', compact(
                'banners',
            ));
        } else {
            //Show site if admin is logged in
            if (auth()->check()  && auth()->user()->isAdmin()) {
                return view('index', compact('banners'));
            }
            return view('underconstruction.index');
        }
    }




    public  function images() {}









    public function home(Request $request)
    {
        $site_status = Live::first();
        $posts = Information::orderBy('created_at', 'DESC')->take(3)->get();
        $banners = Banner::where('type', 'banner')->orderBy('sort_order', 'asc')->get();
        $sliders = Banner::where('type', 'slider')->orderBy('sort_order', 'asc')->get();

        $event = Event::with(['images' => function ($query) {
            $query->limit(8);
        }])->where('type', 'present')->first();

        if (!optional($site_status)->make_live) {
            return view(
                'index',
                [
                    'sliders' => $sliders,
                    'banners' => $banners,
                    'event' => $event
                ]
            );
        } else {
            //Show site if admin is logged in
            if (auth()->check()  && auth()->user()->isAdmin()) {
                return view('index', compact(
                    'sliders',
                    'banners',

                ));
            }
            return view('underconstruction.index');
        }
    }
}
