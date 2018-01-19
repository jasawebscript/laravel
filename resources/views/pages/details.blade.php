@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
        <div class="col-sm-3 col-md-2 hidden-xs-down sidebar">
            <h4>@lang('ico.whats-next')</h4>
            <ul class="sidebar-nav">
                <li class="step-done"><a href="#">@lang('ico.step', ['number' => 1])</a></li>
                <li class="step-done"><a href="{{ route('address') }}">@lang('ico.step', ['number' => 2])</a></li>
                <li class="step-active"><a href="{{ route('details') }}">@lang('ico.step', ['number' => 3])</a></li>
                @if($user->contribution >= 5)
                    <li class="step-other"><a href="{{ route('identification') }}"><span>@lang('ico.other')</span></a></li>
                @endif
            </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 pt-3 ">

            <div class="main container-main">
                <div class="container">
                    <div class="row">
                        <h1 class="text-center">@lang('user.profile')</h1>
                    </div>

                    <form action="{{ route('details') }}" method="post">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1 personal-details">
                                <div class="row">
                                    <div class="col-md-12">
                                        @include('partials.status')
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="input-first-name">@lang('user.first-name')</label>
                                            <input tabindex="1" type="text" class="form-control" id="input-first-name" name="first_name" required minlength="2" maxlength="35" value="{{ old('first_name', $user->first_name) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="input-country">@lang('user.country')</label>
                                            <select tabindex="3" name="country" id="input-country" class="form-control" required>
                                                <option value="" disabled {{ empty(old('country', $user->country ?? $currentCountry)) ? "selected" : "" }}>@lang('user.please-select')</option>
                                                @foreach($countries as $code => $name)
                                                    <option {{ in_array($code, $blacklistedCountries) ? "disabled" : "" }} value="{{ $code }}" {{ old('country', $user->country ?? $currentCountry) == $code ? "selected" : ""  }}>{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-wallet">@lang('user.eth-wallet')</label>
                                            <input {{ !empty($user->wallet) ? "disabled" : "" }} tabindex="5" type="text" class="form-control" value="{{ old('wallet', $user->wallet) }}" name="wallet" id="input-wallet">
                                            <p><span class="red" style="font-size:13px; line-height:18px; margin-top:15px; display: block;">@lang('user.eth-wallet-note')</span></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="input-last-name">@lang('user.last-name')</label>
                                            <input tabindex="2" type="text" class="form-control" id="input-last-name" name="last_name" required minlength="2" maxlength="35" value="{{ old('last_name', $user->last_name) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="input-birthday">@lang('user.birthday')</label>
                                            <input tabindex="4" placeholder="YYYY-MM-DD" type="date" class="form-control" id="input-birthday" value="{{ old('birthday', $user->birthday instanceof \Carbon\Carbon ? $user->birthday->format('Y-m-d') : null) }}" name="birthday" max="{{ \Carbon\Carbon::today()->subYears(8)->toDateString() }}" min="{{ \Carbon\Carbon::today()->subYears(100)->toDateString() }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-contribution">@lang('user.contribution')</label>
                                            <select tabindex="6" name="contribution" id="input-contribution" class="form-control">
                                                <option value="" disabled {{ empty(old('contribution', $user->contribution)) ? "selected" : ""  }}>@lang('user.please-select')</option>
                                                @foreach([
                                                    1 => __('user.less-eth', ['number' => 5]),
                                                    5 => __('user.more-eth', ['number' => 5]),
                                                ] as $state => $name)
                                                    <option value="{{ $state }}" {{ old('contribution', $user->contribution) == $state ? "selected" : "" }}>{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1 buttons">
                                <div class="content dashboard-buttons">
                                    <div class="left text-left">
                                        <a class="button-back" href="{{ route('address') }}">@lang('user.back')</a>
                                    </div>
                                    <div class="right text-right">
                                        <button tabindex="8" type="submit" class="btn btn-primary button-save">@lang('user.save')</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {!! csrf_field() !!}
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
