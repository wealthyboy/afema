@extends('layouts.app')
@section('content')


<div class="video-section mb-2">


   <div id="sm-main-banner" class="main-banner owl-carousel owl-theme d-block d-sm-none slider">
      @foreach($sliders as $key => $image)
      <div data-bg-image="{{ $image->image }}" class=" bg-image-class {{  $key > 0 ? 'd-none' : '' }} item page-header min-vh-75 half-hv position-relative rounded-top">
         <span class="position-absolute top-0 start-0 w-100 h-100 bg-black-2 opacity-50"></span>
      </div>
      @endforeach
   </div>


   <div id="main-banner" class="carousel slide carousel-fade d-none d-md-block" data-ride=" carousel">
      <ol class="carousel-indicators">
         @foreach($sliders as $key => $image)
         <li data-target="#main-banner" data-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : ''}}"></li>
         @endforeach
      </ol>
      <div class="carousel-inner header-filter">
         @foreach($sliders as $key => $image)
         <div class="carousel-item {{ $key === 0 ? 'active' : ''}} ">
            <img src="{{ $image->image }}" class="d-block w-100" alt="...">
         </div>
         @endforeach
      </div>
      <button class="carousel-control-prev" data-target="#main-banner" data-slide="prev"><svg width="51" height="51" viewBox="0 0 21 40" xmlns="http://www.w3.org/2000/svg">
            <path d="M19.9 40L1.3 20 19.9 0" class="carousel-control-prev-icon" aria-hidden="true" stroke="#FFF" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"></path>
         </svg><span class="sr-only">Previous</span>
      </button>

      <button class="carousel-control-next" data-target="#main-banner" data-slide="next"><svg width="19" height="40" viewBox="0 0 19 40" xmlns="http://www.w3.org/2000/svg">
            <path d="M.1 0l18.6 20L.1 40" stroke="#FFF" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"></path>
         </svg><span class="sr-only">Next</span></button>
   </div>

</div>

<div class="   p-3">
   <div class="container-fluid text-center  pb-4 pt-1 primar rounded shadow" bis_skin_checked="1">
      <i>
         Promoting Unity, Culture, Social Engagement, and Development Among Afemai People in Canada
      </i>
   </div>
</div>





<div class="container-fluid mb-2">
   <div class="row">

      <div class="col-md-12">
         <section id="rbox1">
            <div class="row position-relative" itemscope itemtype="https://schema.org/Thing">
               <div class="col-lg-7 col-md-12 rounded card-background-image" itemprop="image">
                  <div id="c1" class="carousel slide" data-ride="carousel">
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <img title="aBOUT " src="https://afemaiassociationofcanada.com/images/banners/FFyG2YJMIeVAHmsd1toogdj7fojUvWcQMuA5oIig.jpg" itemprop="image" class="d-block w-100  image-class" alt="STAY IN THE HEART OF LAGOS avenue montaigne">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-5 col-md-12 welcome text-center d-flex justify-content-center align-items-center" itemprop="description">
                  <div class="about-panel bg-right-panel bg-panel-white bg-panel p-sm-3 p-md-5">
                     <div class="primary-color">Experience community, culture, and connection</div>
                     <h2>This is the Afemai Association of Canada </h2>
                     <p class="mt-4 text-left text-black light-bold">
                        The Afemai Association of Canada (AAC) is a non-profit, non-political social and cultural organization established to serve the interests of Afemai people residing in Canada and North America...
                     </p>
                     <div class="buttons">
                        <a href="/pages/about-us" class="btn btn-primary rounded bold-2">
                           Learn More
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </div>
</div>









<div style="background-color: rgb(248, 245, 244);" class="ap mb-3">
   <div class="container-fluid">
      <div id="intro-box2" class="opacity-0 mt-4 mb-4">
         <h2 class=" text-left" itemprop="name">Core Values</h2>
         <div class="text-secondary text-left mt-2" itemprop="description">
            These values are the foundation of our commitment to excellence, integrity, and impact.
         </div>
      </div>

      <div class="row text-center g-4">

         <!-- Unity -->
         <div class="col-6 col-md-4 col-lg-2 mx-auto">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
               stroke-linecap="round" stroke-linejoin="round" class="mb-3">
               <path d="M10 14l-2 2a4 4 0 1 1 0-5.66L10 14z" />
               <path d="M14 10l2-2a4 4 0 1 1 0 5.66L14 10z" />
               <path d="M14 10l-4 4" />
            </svg>
            <h5>Unity</h5>
            <p class="">We are one indivisible family committed to mutual support, respect, and progress.</p>
         </div>

         <!-- Culture -->
         <div class="col-6 col-md-4 col-lg-2 mx-auto">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
               stroke-linecap="round" stroke-linejoin="round" class="mb-3">
               <path d="M2 12h20M12 2v20M4.5 4.5l15 15M19.5 4.5l-15 15" />
            </svg>
            <h5>Culture</h5>
            <p class="">We proudly celebrate and preserve the customs, language, and traditions of the Afemai people.</p>
         </div>

         <!-- Community -->
         <div class="col-6 col-md-4 col-lg-2 mx-auto">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
               stroke-linecap="round" stroke-linejoin="round" class="mb-3">
               <circle cx="12" cy="12" r="3" />
               <path d="M6.5 12a5.5 5.5 0 1 1 11 0" />
               <path d="M2 12a10 10 0 0 1 20 0" />
            </svg>
            <h5>Community</h5>
            <p class="">We believe in the power of social engagement, friendship, and collective celebration.</p>
         </div>

         <!-- Philanthropy -->
         <div class="col-6 col-md-4 col-lg-2 mx-auto">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
               stroke-linecap="round" stroke-linejoin="round" class="mb-3">
               <path d="M3 12s1 4 6 4h8a4 4 0 0 0 0-8h-1" />
               <path d="M12 21s-6-4.35-6-8a3 3 0 0 1 6-1 3 3 0 0 1 6 1c0 3.65-6 8-6 8z" />
            </svg>
            <h5>Philanthropy</h5>
            <p class="">We are dedicated to giving back through acts of service and support to those in need.</p>
         </div>

         <!-- Development -->
         <div class="col-6 col-md-4 col-lg-2 mx-auto">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
               stroke-linecap="round" stroke-linejoin="round" class="mb-3">
               <polyline points="3 17 9 11 13 15 21 7" />
               <polyline points="21 7 21 13 15 13" />
            </svg>
            <h5>Development</h5>
            <p class="">We champion initiatives that improve the well-being of members and communities in Canada and Edo North.</p>
         </div>

      </div>


   </div>
</div>

<div class="container-fluid">
   <div class="row vh-100">
      <!-- Left Panel -->
      <div id="leftBox" style="z-index: 2;" class="col-md-5 d-flex flex-column justify-content-center align-items-start bg-light p-5">
         <h1 class="mb-4">Our Mission</h1>
         <p class="fs-5">
            To unite Afemai people in Canada by promoting our cultural heritage, encouraging meaningful social connections, and fostering development through advocacy, charitable initiatives, cultural preservation, and active community participation. </p>
      </div>

      <!-- Map Panel -->
      <div id="rightBox" class="col-md-7 p-0">
         <img class="img-fluid" src="/images/svg/equal-diamond-map.svg" class="grid-12 lazyload" alt="Map of the world">
         <div class="indicator">
            <div class="ripple"></div>
            <div class="dot"></div>
         </div>
      </div>
   </div>
</div>



<section class="py-5 bg-lig mb-5">
   <div id="lbox3" class="opacity-0 container">
      <h2 class="mb-4 text-center">Upcoming Events</h2>
      <p class="mb-1 text-center">Don’t miss out on the exciting moments we have planned!</p>

      <div class="row">
         <!-- Example Event Card -->
         <div class="col-md-12 col-lg-12 mb-4">
            <div class="card h-100 shadow-sm border-0">
               <div class="card-body">
                  <h5 class="card-title">Afemai Boat Cruise 2025</h5>
                  <p class="card-text text-muted">
                     Join us for an unforgettable cruise filled with fun, networking, and celebration of our vibrant culture.
                  </p>
                  <p class="card-text fw-bold text-primary">
                     Date: August 17, 2024
                  </p>
               </div>
            </div>
         </div>

         <!-- Add more event cards as needed -->
      </div>
   </div>
</section>








<div class="container-fluid mb-">
   <div class="d-flex justify-content-between align-items-center mb-3">
      <div>
         <h2>
            Latest Events
         </h2>
         <p>
            Stay connected with our most recent gatherings, celebrations, and community moments.
         </p>

      </div>
      <a href="/events" class="bold-2 border">View All Events</a>
   </div>
   <div class="row g-0 p-0">

      @foreach($event->images as $index => $image)
      <div class="col-12 col-md-3 p-0 {{ $index < 3 ? 'd-none d-md-block' : '' }}">
         <a href="/events" target="_blank" rel="noopener noreferrer">
            <div class="position-relative cursor-pointer">
               <img src="{{ $image->image }}" alt="Gallery image {{ $index + 1 }}" class="img-fluid w-100  shadow">

               <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center text-white bg-dark bg-opacity-50 rounded opacity-0 hover-opacity-100 transition-opacity">
                  <span class="bold-2 text-white">{{$event->title}}</span>
               </div>
            </div>
         </a>

      </div>
      @endforeach
   </div>
</div>
@endsection
@section('page-scripts')
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
@stop
@section('inline-scripts')



jQuery(function () {



// Add touch event listeners to centered images
$(".intro-image").on("touchstart", function(event){
// Record the initial touch position
var startX = event.touches[0].clientX;

// Add touch move event listener
$(this).on("touchmove", function(event){
// Calculate the distance moved
var moveX = event.touches[0].clientX - startX;

// If the distance moved is greater than a threshold, trigger carousel swipe
if(Math.abs(moveX) > 50){ // Adjust threshold as needed
if(moveX > 0){
// Swipe right
$(".owl-carousel").trigger("prev.owl.carousel");
} else {
// Swipe left
$(".owl-carousel").trigger("next.owl.carousel");
}

// Remove touchmove event listener to prevent multiple triggers
$(this).off("touchmove");
}
});

// Add touchend event listener to clean up
$(this).on("touchend", function(){
// Remove touchmove event listener
$(this).off("touchmove");
});
});
console.log(true)
});
@stop