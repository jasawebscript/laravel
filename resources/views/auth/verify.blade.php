@extends('layouts.auth')

@section('headline')
    <div class="col-md-8 col-md-push-2 text-center">
        <h1>@lang('user.verified-headline')</h1>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-push-3 personal-details well">
            @if($success)
                <div class="alert alert-success">@lang('user.verified-success')</div>
            @else
                <div class="alert alert-warning">@lang('user.verified-failure')</div>
            @endif
            @auth
                <div class="text-center login-signup-link">
                    <a href="{{ route('address') }}">@lang('user.area')</a> |
                    <a href="{{ route('home') }}">@lang('user.homepage')</a>
                </div>
            @endauth
            @guest
                <div class="text-center login-signup-link">
                    <a href="{{ route('login') }}">@lang('user.login')</a> |
                    <a href="{{ route('register') }}">@lang('user.signup')</a>
                </div>
            @endguest
        </div>
    </div>


@endsection

