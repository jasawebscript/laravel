@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in instructions', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
        @include('partials.instructions-menu')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 pt-3 ">

            <div class="main container-main">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <h1 class="text-center">@lang('ico-instructions.alt-headline')</h1>
                            <p class="instructions-note">@lang('ico-instructions.alt-note')</p>
                            <p>@lang('ico-instructions.alt-p1')</p>
                            <p>@lang('ico-instructions.alt-p2')</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

