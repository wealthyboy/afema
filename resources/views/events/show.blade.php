@extends('layouts.app')
@section('content')

<header class="mb-2">
    <div class="page-header min-vh-75 h-28 position-relative" style="background-image: url(/images/utility/main-banner.jpeg); background-position: top;" loading="lazy">
        <span class="position-absolute top-0 start-0 w-100 h-100  bg-black opacity-50"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-white text-center">
                    <h1 class="title text-white mb-1">{{ 'Events' }}</h1>
                    <p class="text-white-50">
                        Discover our upcoming events that bring the Afemai community together — from cultural celebrations to impactful initiatives.
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="container">



    <!-- Map Panel -->
    <div class="row mb-1 mt vh-100">
        <!-- Map Panel -->
        <div id="rightBox" class="col-lg-7 col-md-12 rounded  {{$loop->iteration % 2 == 0? 'order-1' : 'order-2' }}   card-background-image">
            <div id="gallery-banner-{{$event->id}}" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($event->images as $key => $image)
                    <li data-target="#gallery-banner-{{$event->id}}" data-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : ''}}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">

                    @foreach($event->images as $key => $image)
                    <div class="carousel-item {{ $key === 0 ? 'active' : ''}} ">
                        <img src="{{ $image->image }}" class="d-block w-100" alt="...">
                    </div>
                    @endforeach
                    <!-- <div class="carousel-item">
                           <img src="/images/banners/main_buiding.png" class="d-block w-100" alt="...">
                        </div> -->
                </div>

                <button class="carousel-control-prev" data-target="#gallery-banner-{{$event->id}}" data-slide="prev"><svg width="51" height="51" viewBox="0 0 21 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.9 40L1.3 20 19.9 0" class="carousel-control-prev-icon" aria-hidden="true" stroke="#FFF" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg><span class="sr-only">Previous</span></button>

                <button class="carousel-control-next" data-target="#gallery-banner-{{$event->id}}" data-slide="next"><svg width="19" height="40" viewBox="0 0 19 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M.1 0l18.6 20L.1 40" stroke="#FFF" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg><span class="sr-only">Next</span></button>

            </div>
        </div>



    </div>

    <div class="row mb-1 mt vh-100">

        <div id="leftBox-{{$key}}" style="z-index: 2;" class=" {{$loop->iteration % 2 == 0? 'order-2 order-md-1' : 'order-1 order-md-2' }} col-md-5 d-flex flex-column justify-content-center align-items-start bg-light p-5">
            <a href="http://">
                <h1 class="mb-4 display-4">{{$event->title}} </h1>
            </a>
            <p class="fs-5">
                To unite Afemai people in Canada by promoting our cultural heritage, encouraging meaningful social connections, and fostering development through advocacy, charitable initiatives, cultural preservation, and active community participation.
            </p>
        </div>


    </div>

    @endforeach
    @else
    <div class="alert alert-info">No events available</div>
    @endif


</div>




@endsection
@section('page-scripts')
@stop
@section('inline-scripts')

jQuery(function () {

$(".ro-carousel").owlCarousel({
margin: 10,
nav: true,
dots: false,

responsive: {
0: {
items: 1,
},
600: {
items: 1,
},
1000: {
items: 1,
},
},
});

});




@stop