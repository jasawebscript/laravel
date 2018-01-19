@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
        <div class="col-sm-3 col-md-2 hidden-xs-down sidebar">
            <h4>@lang('ico.whats-next')</h4>
            <ul class="sidebar-nav">
                <li class="step-done"><a href="#">@lang('ico.step', ['number' => 1])</a></li>
                <li class="step-done"><a href="{{ route('address') }}">@lang('ico.step', ['number' => 2])</a></li>
                <li class="step-done"><a href="{{ route('details') }}">@lang('ico.step', ['number' => 3])</a></li>
                <li class="step-active"><a href="{{ route('identification') }}">@lang('ico.step', ['number' => 4])</a></li>
            </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 pt-3 ">

            <div class="main container-main">
                <div class="container">
                    <div class="row">
                        <h1 class="text-center">@lang('user.identity')</h1>
                    </div>

                    <form action="{{ route('identification') }}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1 identity-verification">
                                <div class="row">
                                    <div class="col-md-12">
                                        @include('partials.status')
                                    </div>
                                </div>
                                @if(auth()->user()->identification)
                                    <p>@lang('user.identity-submitted')</p>
                                @else
                                    <div class="row" id="kyc-upload">
                                        <div class="col-md-12">
                                            <p>@lang('user.identity-verification-description')</p>
                                            <div class="file-input">
                                                <input type="file" name="file">
                                            </div>
                                            <span class="text-muted">@lang('user.identity-file-constraints')</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1 buttons">
                                <div class="content dashboard-buttons">
                                    <div class="left text-left">
                                        <a class="button-back" href="{{ route('details') }}">@lang('user.back')</a>
                                    </div>

                                    @if(!auth()->user()->identification)
                                        <div class="right text-right">
                                            <button tabindex="8" type="submit" class="btn btn-primary button-save">@lang('user.save')</button>
                                        </div>
                                    @endif
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
