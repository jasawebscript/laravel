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
                        <!--
                        <div class="col-xs-12 col-md-12 text-center commission-announcement">
                            <h3>Now earn even MORE! Get</h3>
                            <h1><span class="percent">5%</span> commission</h1>
                            <h3>of your referred clients contribution</h3>
                        </div>
                        -->
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="row">
                                <div class="col-md-8 col-md-push-2 text-center referral-box">
                                    <h4 class="referral-box-label">@lang('affiliate.referral_link_label') <a style="color:#fff; text-decoration: underline;" href="{{ route('affiliate4') }}">See How</a></h4>
                                    <input class="well well-important" id="referral-link" onclick="this.setSelectionRange(0, this.value.length)" id="referral-link" value="https://stude.co/{{ auth()->user()->id }}" readonly>
                                    <div class="copy-input" data-target="#referral-link">
                                        <span class="done">@lang('ico.copied')</span>
                                        <a class="copy">@lang('user.copy')</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 share">
                            <div class="col-md-6 col-md-push-3 text-center">
                                <div class="share-arrow"></div>
                                <div class="share-buttons large">
                                    <a class="telegram-share" href="javascript:window.open('https://t.me/share/url?url=https://stude.co/{{ auth()->user()->id }}', '_blank')">
                                        <i></i>
                                        <span>Share on Telegram</span>
                                    </a>

                                    <a class="twitter-share text-center" href="http://twitter.com/intent/tweet?url=https://stude.co/{{ auth()->user()->id }}&text=BitDegree%20-%20the%20most%20promising%20Blockchain%20Learning%20Platform%20of%202018%20with%2029%20million%20user%20base.%20Don't%20miss,%20check%20it%20out:&via=bitdegree_org&hashtags=crowdsale%2Cblockchain%2CICO" target="_blank" class="share-btn twitter">
                                        <i class="fa fa-twitter"></i> Share on Twitter
                                    </a>

                                    <!-- AddToAny BEGIN -->
                                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                        <a class="a2a_button_facebook"></a>
                                        <a class="a2a_button_google_plus"></a>
                                        <a class="a2a_button_linkedin"></a>
                                        <a class="a2a_button_reddit"></a>
                                        <a class="a2a_button_tumblr"></a>
                                        <a class="a2a_button_vk"></a>
                                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                    </div>
                                    <script>
                                        var a2a_config = a2a_config || {};
                                        a2a_config.linkname = "BitDegree";
                                        a2a_config.linkurl = "https://stude.co/{{ auth()->user()->id }}";
                                        a2a_config.color_main = "D7E5ED";
                                        a2a_config.color_border = "AECADB";
                                        a2a_config.color_link_text = "333333";
                                        a2a_config.color_link_text_hover = "333333";
                                    </script>
                                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                                    <!-- AddToAny END -->

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