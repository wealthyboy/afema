<?php

namespace App\Http\Controllers\WebHook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;






class WebHookController extends Controller
{

    public  $settings;

    public function __construct() {}




    public function gitHub()
    {
        $output = shell_exec('sh /home/forge/afemaiassociationofcanada.com/deploy.sh');
        echo "Successfull";
        Log::info($output);
    }
}
