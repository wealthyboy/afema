<?php

namespace App\Http\Controllers\Admin\Visits;

use App\Http\Controllers\Controller;
use App\Models\UserTracking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VisitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $source = request('referer');
        $from = request('from');
        $to = request('to');

        // Default to today if no date filter is set
        $startDate = $from ? Carbon::parse($from)->startOfDay() : now()->startOfDay();
        $endDate = $to ? Carbon::parse($to)->endOfDay() : now()->endOfDay();

        $visits = \DB::table('user_trackings')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->whereIn('id', function ($query) {
                $query->selectRaw('MIN(id)')
                    ->from('user_trackings')
                    ->groupBy('session_id');
            })
            ->when($source, function ($query, $source) {
                $query->where('referer', 'like', "%{$source}%");
            })
            ->orderByDesc('id')
            ->paginate(20);

        $knownSources = ['google', 'instagram', 'twitter', 'facebook'];

        $otherCount = UserTracking::whereBetween('created_at', [$startDate, $endDate])
            ->where(function ($query) use ($knownSources) {
                foreach ($knownSources as $source) {
                    $query->where('referer', 'not like', '%' . $source . '%');
                }
            })->count();

        $sourceCounts = [
            'google' => UserTracking::whereBetween('created_at', [$startDate, $endDate])->where('referer', 'like', '%google%')->count(),
            'instagram' => UserTracking::whereBetween('created_at', [$startDate, $endDate])->where('referer', 'like', '%instagram%')->count(),
            'twitter' => UserTracking::whereBetween('created_at', [$startDate, $endDate])->where('referer', 'like', '%twitter%')->count(),
            'facebook' => UserTracking::whereBetween('created_at', [$startDate, $endDate])->where('referer', 'like', '%facebook%')->count(),
            'others' => $otherCount,
        ];

        return view('admin.visits.index', compact('visits', 'sourceCounts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tracking = UserTracking::with('apartment')->find($id);
        return view('admin.visits.show', compact('tracking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
