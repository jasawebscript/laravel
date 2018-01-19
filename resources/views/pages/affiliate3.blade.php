@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
        @include('partials.referral-menu')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 pt-3 ">

            <div class="main container-main">
                <div class="container">

                    <div class="row">
                        <div class="col-xs-12 col-md-12 text-center">
                            <h1>@lang('affiliate.headline')</h1>
                            <h3 class="subtitle">@lang('affiliate.subtitle')</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="row">
                                <div class="col-md-6 col-md-push-3 text-center referral-box">
                                    <h4 class="referral-box-label">@lang('affiliate.referrals_count_label')</h4>
                                    <div class="well well-important">
                                        @if($referralCount == 0)
                                            @lang('affiliate.1-referral')
                                        @else
                                            @lang('affiliate.n-referrals', ['number' => $referralCount + 1])
                                        @endif
                                    </div>
                                </div>
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