<nav class="navbar navbar-expand-lg navbar-light shadow-sm head fixed-top header-background">

    <a class="navbar-brand" @if(isset($pageName) && $pageName != '/') href="{{ url_with_locale('/') }}" @endif>

        <div class="micro_logo"></div>

        <span class="header_site_name">VTH</span>

    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">

        <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">

            <a class="nav-link"
               href="{{ url_with_locale('/category') }}" id="drop_down_category">
                <span class="header-link-color">@lang('site.header.category')</span>
            </a>

        </div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">

            <a class="nav-link @if($pageName == 'forum') disabled @endif"
               href=""><span class="header-link-color">@lang('site.header.brands')</span></a>

        </div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">

            <a class="nav-link @if($pageName == 'blog') disabled @endif"
               href=""><span class="header-link-color">@lang('site.header.useful')</span></a>

        </div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">

            <a class="nav-link @if($pageName == 'contacts') disabled @endif"
               href=""><span class="header-link-color">@lang('site.header.contacts')</span></a>

        </div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 offset-lg-2 offset-xl-2">

            <a class="nav-link"
               href=""><span class="header-link-color">8-099-000-00-00</span></a>

        </div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">

            <a class="nav-link @if($pageName == 'contacts') disabled @endif"
               href=""><span class="header-link-color">@lang('site.header.comparison')</span></a>

        </div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">

            <a class="nav-link @if($pageName == 'contacts') disabled @endif"
               href=""><span class="header-link-color">@lang('site.header.favorites')</span></a>

        </div>

        @if($pageName != 'admin')

            @if ( app()->getLocale() == 'ua' )

                <div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">
                    <a class="disabled lang-link-disabled">UA</a>
                    <span class="lang-link-enabled">|</span>
                    <a class="lang-link-enabled" href=" {{ $path }} ">RU</a>
                </div>

            @else

                <div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">
                    <a class="lang-link-enabled" href=" {{ $path }}">UA</a>
                    <span class="lang-link-enabled">|</span>
                    <a class="disabled lang-link-disabled">RU</a>
                </div>

            @endif

        @endif

    </div>

</nav>

<script src=" {{ asset('js/site/header.js') }}" defer></script>

