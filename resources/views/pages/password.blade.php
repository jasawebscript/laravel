@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">

        <div class="col-sm-12 col-md-12 ">

            <div class="main container-main">
                <div class="container">
                    <div class="row">
                        <h1 class="text-center">@lang('user.change-your-pass')</h1>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1 change-password">
                            @include('partials.status')
                            <form action="{{ route('password') }}" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group">
                                            <label for="input-password">@lang('user.new-pass')</label>
                                            <input type="password" class="form-control" id="input-password" name="password" required minlength="3">
                                        </div>
                                        <div class="form-group">
                                            <label for="input-password-confirmation">@lang('user.confirm-pass')</label>
                                            <input type="password" class="form-control" id="input-password-confirmation" name="password_confirmation" required minlength="3">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center buttons">
                                    <button class="btn btn-default">@lang('user.save-changes')</button>
                                </div>
                                {!! csrf_field() !!}
                            </form>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>


@endsection

