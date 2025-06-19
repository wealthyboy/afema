@extends('admin.layouts.app')



@section('content')

<div id="app" class="container-fluid" bis_skin_checked="1">
    <div class="row" bis_skin_checked="1">
        @foreach($stats as $stat)
        <div class="col-lg-3 col-md-6 col-sm-6" bis_skin_checked="1">
            <div class="card card-stats" bis_skin_checked="1">
                <div class="card-content" bis_skin_checked="1">
                    <p class="category text-bold"><b>{{ $stat['title']}}</b></p>
                    <h3 class="card-title">{{ $stat['value'] }}</h3>
                </div>
                <div class="card-footer text-right" bis_skin_checked="1">
                    <div class="stats" bis_skin_checked="1">
                        <i class="material-icons text-danger">forward</i> <a href="{{ $stat['link'] }}" bis_skin_checked="1"><b>View</b></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>







@endsection