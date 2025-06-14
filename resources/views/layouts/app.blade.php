@inject('helper', 'App\Http\Helper')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('_partials.header_styles')

<body>
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

   @include('_partials.modal')


   <script src="/js/services_js.js?version={{ str_random(6) }}"></script>

   @yield('page-scripts')
   <script type="text/javascript">
      @yield('inline-scripts')
   </script>

</body>

</html>