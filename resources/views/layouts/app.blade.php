@inject('helper', 'App\Http\Helper')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('_partials.header_styles')

<body>
   <div id="topProgress" class="progress fixed-top" style="height:3px; z-index:9999;">
      <div class="progress-bar bg-danger" role="progressbar"
         style="width:0%; transition:width 2.5s linear;"
         aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
      </div>
   </div>
   <div id="app" class="app">
      <nav class="navbar  navbar-fixed-top navbar-expand-lg   navbar-absolute" color-on-scroll="100" id="sectionsNav">
         @include('_partials.header', ['show_logo' => true, 'show_book' => true])
      </nav>
      <div id="content" class="main index-page">
         @yield('content')
      </div>
      @include('_partials.footer')
      </footer>
   </div>

   <div class="watsapp pt-3 d-block d-md-none">
      <a class="chat-on-watsapp bg-dark bold-2" href="/register">
         Register
         <i class="fas fa-arrow-right fa-2x float-right mr-2"></i>
      </a>
   </div>



   <script src="/js/services_js.js?version={{ str_random(6) }}"> </script>

   @yield('page-scripts')
   <script type="text/javascript">
      function slowSetProgress(percent) {
         const bar = document.querySelector('#topProgress .progress-bar');
         bar.style.width = percent + '%';
         bar.setAttribute('aria-valuenow', percent);
      }

      slowSetProgress(100);

      @yield('inline-scripts')
   </script>

</body>

</html>