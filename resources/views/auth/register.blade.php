@extends('layouts.auth')

@section('headline')
    @if(config('ico.started'))
        <div class="col-md-8 col-md-push-2 text-center">
            <h1>@lang('ico.join-now-headline')</h1>
            <h3 class="subtitle">@lang('ico.join-now-subheadline')</h3>
        </div>
    @else
        <div class="col-md-8 col-md-push-2 text-center">
            <h1>@lang('user.signup-headline')</h1>
        </div>
    @endif
@endsection

@section('content')

<div class="row">
    <div class="col-xs-12 col-md-6 col-md-push-3 personal-details well">
        <form action="{{ route('register') }}" method="post">
            <div class="form-group">
                <label for="input-email">@lang('user.email')</label>
                <input tabindex="1" type="email" data-validate="email" class="form-control" value="{{ old('email') }}" name="email" id="input-email" autofocus required>
            </div>
            <div class="form-group">
                <label for="input-password">@lang('user.password')</label>
                <input tabindex="2" class="form-control" type="password" name="password" required minlength="3">
            </div>
                <div class="agreement">
                    <input tabindex="3" type="checkbox" id="agreeToTerms" name="agreement" {{ old('agreement', false) ? 'checked' : '' }} value="1">
                    <label for="agreeToTerms">@lang('user.terms', [
                        'termsLink' => asset_rev('files/terms-of-service.pdf'),
                        'privacyLink' => asset_rev('files/privacy-policy.pdf'),
                    ])</label>
                </div>
                <div class="agreement">
                    <input tabindex="4" type="checkbox" id="agreeToTermsUs" name="agreement-us" {{ old('agreement-us', false) ? 'checked' : '' }} value="1">
                    <label for="agreeToTermsUs">@lang('user.terms-us')</label>
                 </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center login-cta signup-cta cta"><button tabindex="5" type="submit" class="btn btn-primary">{{ config('ico.started') ? __('ico.join') : __('user.signup') }}</button></div>
                </div>
            </div>
            {!! csrf_field() !!}
        </form>
        <div class="text-center login-signup-link">
            <a href="{{ route('login') }}">@lang('user.login')</a> |
            <a href="{{ route('password.request') }}">@lang('user.forgot-pass')</a>
        </div>
    </div>
</div>

@endsection