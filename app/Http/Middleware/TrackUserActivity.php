<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserTracking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;


class TrackUserActivity
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        return $response;
    }
}
