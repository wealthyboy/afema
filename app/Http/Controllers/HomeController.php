<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Live;
use App\Models\Information;
use App\Models\Event;
use App\Models\Banner;
use Illuminate\Support\Carbon;




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
        $banners = Banner::banners()->get();
        $event = Event::with('images')->first();



        return view('index', compact(
            'banners',
            'event'
        ));
        if (!$site_status->make_live) {
            return view('index', compact(
                'banners',
                'event'
            ));
        } else {
            //Show site if admin is logged in
            if (auth()->check()) {
                return view('index', compact(
                    'banners',
                    'event'
                ));
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

        $upcoming_event = Event::where('type', 'upcoming')->first();
        $nextEvent = Event::where('type', 'upcoming')->whereDate('date_of_event', '>=', Carbon::today())
            ->orderBy('date_of_event', 'asc')
            ->first();





        if (!optional($site_status)->make_live) {
            return view(
                'index',
                [
                    'sliders' => $sliders,
                    'banners' => $banners,
                    'event' => $event,
                    'upcoming_event' => $upcoming_event
                ]
            );
        } else {
            //Show site if admin is logged in
            if (auth()->check()) {
                return view('index', compact(
                    'sliders',
                    'banners',
                    'event',
                    'upcoming_event'
                ));
            }
            return view('underconstruction.index');
        }
    }
}
