<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@lang('home.title')</title>

    @include('partials.tag-manager-head')

    <meta name="description" content="@lang('home.meta_description')">
    <meta name="keywords" content="@lang('home.meta_keywords')">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="@lang('home.title')" />
    <meta property="og:description" content="@lang('home.meta_description')" />

    @include('partials.social-meta')
    @include('partials.stylesheets')
    @include('partials.smartlook')
</head>

<body class="landing login-page get-tokens login-signup lang-{{ $languages[$currentLanguage] }}" data-spy="scroll" data-target="#sidebar" data-offset="150">
    @include('partials.tag-manager-body')

    <div id="top"></div>

    <div class="main">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="col-md-3">
                    <div class="dashboard-logo">
                        <a href="{{ route('home') }}" class="login-logo">
                            <img class="logo" src="{{ asset_rev('bitdegree-logo.png') }}" alt="BitDegree">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="container main">
                <div class="content">
                    <div class="row">
                        @section('headline')
                            @if(config('ico.started'))
                                <div class="col-md-8 col-md-push-2 text-center">
                                    <h1>Join Crowdsale and Receive Tokens Immediately</h1>
                                </div>
                            @else
                                <div class="col-md-8 col-md-push-2 text-center">
                                    <h1>BitDegree Authentication</h1>
                                </div>
                            @endif
                        @endsection
                        @yield('headline')
                    </div>
                    @include('partials.status')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @include('partials.scripts')
    @stack('body-scripts')
</body>

</html>