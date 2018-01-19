@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
        @include('partials.referral-menu')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 pt-3 ">

            <div class="main container-main">
                <div class="container">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="referral-description">
                                <h1>@lang('affiliate.how')</h1>
                                <ul>
                                    <li>@lang('affiliate.how-descr-1')</li>
                                    <li>@lang('affiliate.how-descr-2')</li>
                                </ul>
                                <h3>@lang('affiliate.restrictions')</h3>
                                <ul>
                                    <li>@lang('affiliate.restriction-1')</li>
                                    <li>@lang('affiliate.restriction-2')</li>
                                </ul>
                                <p>@lang('affiliate.breaking')</p>
                            </div>
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