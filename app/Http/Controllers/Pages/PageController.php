<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Helper;
use App\Models\Apartment;
use App\Models\Gallery;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;



class PageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = request();
        $links = [
            'contact-us' => 'contact_us',
            'experience' => 'experience',
            'about-us' => 'about',
            'gallery' => 'gallery',
        ];

        // Path to the folder containing the images
        
        return view('links.' . $links[request()->path()], ));
    }


    public function gallery(Request $request) {
        $apartments = Apartment::where('allow', true)->get();
       return view('pages.gallery', compact('apartments'));
    }


    public  static function generateThumbnailUrl($originalUrl)
    {
        // Extract the ID from the original URL using regular expressions
        preg_match('/\/file\/d\/(.+?)\//', $originalUrl, $matches);
        $id = $matches[1];

        // Construct the thumbnail URL
        $thumbnailUrl = "https://drive.google.com/thumbnail?id={$id}&sz=w2000";

        return $thumbnailUrl;
    }

   
}
