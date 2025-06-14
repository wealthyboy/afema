@extends('layouts.listing')
@section('content')

<header>
  <div class="page-header min-vh-75 h-28 position-relative" style="background-image: url(https://afemaiassociationofcanada.com/images/events/DsORTns9siEfCmKLno73OFF6rkoxSeAcriEUJRXQ.jpg); background-position: top;" loading="lazy">
    <span class="position-absolute top-0 start-0 w-100 h-100  bg-black opacity-50"></span>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-white text-center">
          <h1 class="title text-white">{{ $information->title }}</h1>
        </div>
      </div>
    </div>
  </div>
</header>

<div style="background-color: #f8f5f4;">

  <section id="home">
    <div class="container">
      <div class="row justifiy-content-center">
        <div id="content" class="col-md-12  mb-5">
          @if ($message = \Session::get('success'))
          <p><a href="">
              <<< Back </a>
          </p>
          <div class="alert alert-success color--light alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
          @elseif ($errors->any() )
          <p><a href="">
              <<< Back </a>
          </p>
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>

          @else
          <p><?php echo  html_entity_decode($information->description);  ?></p>
          @endif
        </div>
        <div class="margin-top-35"></div>
      </div> <!-- /row -->
    </div> <!-- /container -->
  </section>

  <section class="bg-light py-5">
    <div class="container">
      <div class="row">

        <!-- Vision -->
        <div class="col-md-6 mb-4">
          <div class="p-4 bg-white shadow rounded h-100">
            <h3 class="mb-3 text-primary">Our Vision</h3>
            <p>
              To be a strong, vibrant, and united organization that promotes Afemai values, identity, and social cohesion while empowering the Afemai across generations.
            </p>
          </div>
        </div>

        <!-- Objectives -->
        <div class="col-md-6 mb-4">
          <div class="p-4 bg-white shadow rounded h-100">
            <h3 class="mb-3 text-primary">Our Objectives</h3>
            <ul class="mb-0">
              <li>To preserve and promote the cultural values, language, and traditions of the Afemai people.</li>
              <li>To foster partnerships with other cultural, community, and welfare organizations that support individuals and groups across Canada.</li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </section>



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

  <div class="container-fluid mb-3">
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




  @endsection
  @section('page-scripts')
  @stop
  @section('inline-scripts')

  const form = document.getElementById('contact');

  let input = document.querySelector('input[name="phone"]');

  form.addEventListener("submit", function (e) {
  e.preventDefault();
  if (input.value) {
  return false;
  }
  this.submit()
  return false;

  });




  @stop