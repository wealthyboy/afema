<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\UserTracking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class HomeCtrl extends Controller
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

     public function index()
     {

          $totalUsers  = User::where('type', 'subscriber')->count();

          // “new” = registered today
          $newUsersToday = User::whereDate('created_at', Carbon::today())->count();

          // “new this month”
          $newUsersThisMonth = User::whereYear('created_at', Carbon::now()->year)
               ->whereMonth('created_at', Carbon::now()->month)
               ->count();

          $visitsToday = UserTracking::whereDate('created_at', Carbon::today())->count();


          // ── Build the card data ────────────────────────────
          $stats = [
               [
                    'title' => 'Total Users',
                    'value' => $totalUsers,
                    'link'  => route('admin.users.index'),
               ],
               [
                    'title' => 'New Users Today',
                    'value' => $newUsersToday,
                    'link'  => route('admin.users.index', ['filter' => 'today']),
               ],
               [
                    'title' => 'New Users This Month',
                    'value' => $newUsersThisMonth,
                    'link'  => route('admin.users.index', ['filter' => 'month']),
               ],
               [
                    'title' => 'Visits Today',
                    'value' => $visitsToday,
                    'link'  => "#",
               ],
          ];

          return view('admin.index', compact('stats'));
     }
}
