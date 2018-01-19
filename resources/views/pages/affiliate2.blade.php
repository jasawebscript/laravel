@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
        @include('partials.referral-menu')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 pt-3 ">

            <div class="main container-main">
                <div class="container">

                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <h1 class="text-center">@lang('affiliate.banners-to-use')</h1>
                            <p class="text-center subtitle">@lang('affiliate.banners-to-use-subtitle')</p>

                            @foreach($banners as $i => $banner)
                                <div class="col-xs-12 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4>@lang('affiliate.banner') <span class="label label-default pull-left">{{ $banner['width'].'x'.$banner['height'] }}</span></h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="banner-image text-center">
                                            <img src="{{ $banner['url'] }}" alt="@lang('affiliate.banner-alt')">
                                        </div>
                                        <textarea id="banner-code-{{ $i }}" readonly onclick="this.setSelectionRange(0, this.value.length)" class="form-control select-all">{{ '<a href="'.route('affiliate-cookie', auth()->id()).'" target="_blank"><img src="'.$banner['url'].'" width="'.$banner['width'].'" height="'.$banner['height'].'" alt="'.__('affiliate.banner-alt').'"></a>'}}</textarea>
                                        <div class="copy-input" data-target="#banner-code-{{ $i }}">
                                            <span class="done">@lang('ico.copied')</span>
                                            <a class="copy">@lang('user.copy')</a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('body-scripts')
    <script>
        jqWait(function () {
            if(typeof document.execCommand === 'function') {
                $('.copy-input').show();
            }

            var handles = {};

            $('.copy-input .copy').click(function () {
                var container = $(this).closest('.copy-input'), message = $('.done', container);
                var targetSelector = container.attr('data-target'), target = $(targetSelector);

                target.select();
                document.execCommand('Copy');
                message.fadeIn();

                if(handles[targetSelector]) clearTimeout(handles[targetSelector]);
                handles[targetSelector] = setTimeout(function () {
                    message.fadeOut();
                }, 2500);
            });
        })
    </script>

@endpush