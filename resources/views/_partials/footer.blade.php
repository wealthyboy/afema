<footer class=" pt-8 pb-6 footer text-muted fixed-">
    <div class="container container-xxl">


        <div class="mt-0 mt-md-10 row">
            <div class="col-md-12 text-center">
                <ul class="pull-center">
                    @foreach($footer_info as $info)
                    <li>
                        <a href="/pages/{{ $info->slug }}">
                            {{ title_case($info->title) }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>



            <div class="col-md-12 copyright text-center">
                <p class="">© Copyright Afemai Association of Canada
                    {{ date('Y') }}. All rights reserved.
                    @if ( auth()->check() && auth()->user()->isAdmin() )
                    <a target="_blank" class="text-white" href="/admin">Go to Admin</a>
                    @endif
                </p>

                <div class="container">
                    <a href="{{$system_settings->facebook_link}}" target="_blank" class="text-white mx-3 fs-4">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="{{$system_settings->instagram_link}}" target="_blank" class="text-white mx-3 fs-4">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>