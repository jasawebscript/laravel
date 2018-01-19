<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@lang('home.title')</title>

    @include('partials.tag-manager-head')

    <meta name="description" content="@lang('home.meta_description_courses')">
    <meta name="keywords" content="@lang('home.meta_keywords')">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('partials.social-meta')
    @include('partials.stylesheets')
    @include('partials.smartlook')
</head>

<body class="landing {{ $bodyClass or 'front-page' }} lang-{{ $languages[$currentLanguage] }}" data-spy="scroll" data-target="#sidebar" data-offset="150">
@include('partials.tag-manager-body')

@include('partials.landing.header')
@yield('content')
@include('partials.landing.footer')
@include('partials.scripts')
@stack('body-scripts')
</body>

</html>