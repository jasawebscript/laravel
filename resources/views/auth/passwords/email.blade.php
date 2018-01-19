@extends('layouts.auth')

@section('headline')
    <div class="col-md-8 col-md-push-2 text-center">
        <h1>@lang('user.reset-password')</h1>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-push-3 personal-details well">
            <form action="{{ route('password.email') }}" method="post">
                <div class="form-group">
                    <label for="input-email">@lang('user.email')</label>
                    <input type="email" data-validate="email" class="form-control" value="{{ old('email') }}" name="email" id="input-email" autofocus required>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center cta"><button type="submit" class="btn btn-primary">@lang('user.reset-button')</button></div>
                    </div>
                </div>
                {!! csrf_field() !!}
            </form>
            <div class="text-center login-signup-link">
                <a href="{{ route('login') }}">@lang('user.login')</a> |
                <a href="{{ route('register') }}">@lang('user.signup')</a>
            </div>
        </div>
    </div>

@endsection
