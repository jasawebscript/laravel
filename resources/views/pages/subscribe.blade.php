@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list'])

@section('content')

    <div class="main container-fluid communicate image-bkg">
        <div class="container image-bkg-wrap">
            <div class="image-bkg">
                <div class="image-bkg-overlay"></div>
                <img class="degree-img" src="{{ asset_rev('subscribe-bkg.jpg') }}" alt="">
            </div>

            <div class="subscribe-container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="title text-center" style="font-size:38px;">@lang('subscribe.title_alt')</h2>

                        @include('partials.subscribe-block')
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection