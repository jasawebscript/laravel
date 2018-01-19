@extends('layouts.auth')

@section('headline')
    @if(config('ico.started'))
        <div class="col-md-8 col-md-push-2 text-center">
            <h1>@lang('ico.join-now-headline')</h1>
            <h3 class="subtitle">@lang('user.login-subheadline')</h3>
        </div>
    @else
        <div class="col-md-8 col-md-push-2 text-center">
            <h1>@lang('user.login-headline')</h1>
            <p style="padding-bottom: 35px;">@lang('user.login-subtitle')</p>
        </div>
    @endif
@endsection

@section('content')

<div class="row">
    <div class="col-xs-12 col-md-6 col-md-push-3 personal-details well">
        <form action="{{ route('login') }}" method="post">
            <div class="form-group">
                <label for="input-email">@lang('user.email')</label>
                <input type="email" data-validate="email" class="form-control" value="{{ old('email') }}" name="email" id="input-email" autofocus required>
            </div>
            <div class="form-group">
                <label for="input-password">@lang('user.password')</label>
                <input class="form-control" type="password" name="password" required>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="text-center login-cta cta"><button type="submit" class="btn btn-primary">@lang('user.login')</button></div>
                </div>
            </div>
            <input type="hidden" name="destination" value="{{ $destination }}">
            {!! csrf_field() !!}
        </form>
        <div class="text-center login-signup-link">
            <a href="{{route('register') }}">@lang('user.signup')</a> |
            <a href="{{ route('password.request') }}">@lang('user.forgot-pass')</a>
        </div>
    </div>
</div>

@endsection

