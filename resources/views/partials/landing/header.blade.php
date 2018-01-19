
<header class="{{ $navBarOnly ?? false ? 'container-fluid' : '' }}">
    @if(!($navBarOnly ?? false))

        @push('body-scripts')
            <script>
                jqWait(function(){
                    $(window).on("load", function() {
                        var bg = $('#bgvid'), src = $('source', bg);
                        src.attr('src', src.attr('data-src'));
                        if(bg.length > 0) {
                            bg[0].loop = true;
                            bg[0].load();
                            bg[0].play();
                        }
                    });
                });
            </script>
        @endpush

        <nav id="sidebar" class="sidebar side-nav">
            <ul class="nav nav-list affix">
                <li><a href="#top">@lang('navigation.top')</a></li>
                <li><a href="#what-are-we">01. <span>@lang('navigation.what-it-is')</span></a></li>
                <li><a href="#starting-point">02. <span>@lang('navigation.users')</span></a></li>
                <li><a href="#why-us">03. <span>@lang('navigation.problems')</span></a></li>
                <li><a href="#statistics">04. <span>@lang('navigation.moocs')</span></a></li>
                <li><a href="#mvp">05. <span>@lang('navigation.perspective')</span></a></li>
                <li><a href="#demand-forecast">06. <span>@lang('navigation.demand')</span></a></li>
                <li><a href="#token-economy">07. <span>@lang('navigation.economy')</span></a></li>
                <li><a href="#token-distribution">08. <span>@lang('navigation.distribution')</span></a></li>
                <li><a href="#team">09. <span>@lang('navigation.team')</span></a></li>
                <li><a href="#roadmap">10. <span>@lang('navigation.roadmap')</span></a></li>
            </ul>
        </nav>
    @endif

    <div class="container header-content">
        <div class="navbar" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="{{ route('home') }}" class="navbar-logo navbar-brand">
                        <img class="logo" src="{{ asset_rev('bitdegree-logo.png') }}" alt="BitDegree">
                    </a>

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>

                </div>

                @auth
                    <a class="login-link hidden-xs" href="{{ route('user') }}">• @lang('user.my_account')</a>
                @endauth
                @guest
                    <a class="login-link hidden-xs" href="{{ route('login') }}">• @lang('user.login')</a>
                @endguest

                <div id="navbar" class="collapse navbar-collapse navbar-container">
                    <div class="mobile-language-dropdown visible-xs-block">
                        <a class="active" href="#language-toggle" data-toggle="collapse">
                            <img src="{{asset_rev('flags/'.$languages[$currentLanguage].'.png')}}"> {{ $languages[$currentLanguage] }}
                        </a>
                        <div class="collapse list" id="language-toggle">
                            @foreach($languages as $code => $name)
                                <div class="language {{ $name }} {{ $code == $currentLanguage ? "current" : "" }}">
                                    <a href="{{ url('/'.$code.'/token') }}" class="{{ $code == $currentLanguage }}">
                                        <img src="{{asset_rev('flags/'.$name.'.png')}}"> {{ $name }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('home') }}#what-are-we" data-toggle="collapse" data-target=".navbar-collapse.in">@lang('navigation.what-is')</a></li>
                        <li class="narrow"><a href="{{ route('home') }}#team" data-toggle="collapse" data-target=".navbar-collapse.in">@lang('navigation.people')</a></li>
                        <li class="narrow middle"><a href="{{ route('home') }}#mvp" data-toggle="collapse" data-target=".navbar-collapse.in">@lang('navigation.mvp')</a></li>
                        <li class="narrow middle"><a href="{{ route('faq') }}#faqs">@lang('navigation.faq')</a></li>
                        <li class="narrow"><a href="{{ route('home') }}#token-distribution" data-toggle="collapse" data-target=".navbar-collapse.in">@lang('navigation.token')</a></li>
                        @if($currentLanguage == "cn")
                         <li class="narrow"><a href="{{ asset_rev('files/pitch-deck-cn.pdf') }}" target="_blank">@lang('navigation.one-pager')</a></li>
                        @else
                        <li class="narrow"><a href="{{ asset_rev('files/pitch-deck.pdf') }}" target="_blank">@lang('navigation.one-pager')</a></li>
                        @endif

                    </ul>
                    <ul class="nav navbar-nav navbar-right no-padding visible-xs-block">
                        @if($currentLanguage == "cn")
                            <li><a href="https://www.bitdegree.org/white-paper-cn.pdf" class="navbar-cta" target="_blank">@lang('navigation.white-paper')</a></li>
                        @elseif($currentLanguage == "ru")
                            <li><a href="https://www.bitdegree.org/white-paper-ru.pdf" class="navbar-cta" target="_blank">@lang('navigation.white-paper')</a></li>
                        @else
                            <li><a href="https://www.bitdegree.org/white-paper.pdf" class="navbar-cta" target="_blank">@lang('navigation.white-paper')</a></li>
                        @endif
                        @guest
                            <li><a href="{{ route('login') }}">@lang('user.login')</a></li>
                        @endguest
                        @auth
                            <li><a href="{{ route('address') }}">@lang('user.my_account')</a></li>
                        @endauth
                    </ul>
                    <ul class="cta-menu hidden-xs">
                        @if($currentLanguage == "cn")
                            <li><a href="https://www.bitdegree.org/white-paper-cn.pdf" class="navbar-cta" target="_blank">@lang('navigation.white-paper')</a></li>
                        @elseif($currentLanguage == "ru")
                            <li><a href="https://www.bitdegree.org/white-paper-ru.pdf" class="navbar-cta" target="_blank">@lang('navigation.white-paper')</a></li>
                        @else
                            <li><a href="https://www.bitdegree.org/white-paper.pdf" class="navbar-cta" target="_blank">@lang('navigation.white-paper')</a></li>
                        @endif
                    </ul>
                    <ul class="cta-menu visible-xs-block">
                        <li><a href="{{ route(auth()->check() ? 'address' : 'register') }}" class="navbar-cta navbar-cta-red">@lang('ico.get-tokens-now')</a></li>
                    </ul>

                    <div class="dropdown lang-menu hidden-xs">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown"><img src="{{asset_rev('flags/'.$languages[$currentLanguage].'.png')}}"> <span class="caret"></span></button>
                        <ul class="dropdown-menu ">
                            @foreach($languages as $code => $name)
                                <li class="{{ $name }} {{ $code == $currentLanguage ? "current" : "" }}"><a href="{{ url('/'.$code.'/token') }}" class="{{ $code == $currentLanguage }}">
                                        <img src="{{asset_rev('flags/'.$name.'.png')}}"> {{ $name }}
                                    </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        @if(!($navBarOnly ?? false))
            <div class="row">
                <div class="col-xs-12 text-center">
                    @if(config('ico.start')->isFuture())
                        <h2 class="title">@lang('home.header_title')</h2>
                        <div class="description">
                            <p>@lang('home.header_subtitle')</p>
                        </div>
                    @endif

                    <div class="ico-progress">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-md-8 col-md-offset-2">
                                    @if(config('ico.start')->isFuture())
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h1 class="text-center">@lang('ico.home-countdown')</h1>
                                            </div>
                                        </div>
                                        @include('partials.countdown', ['timeLeft' => config('ico.start')->diffInSeconds()])
                                    @else

                                        @if($hardCapReached)
                                            <h2 class="text-center"><strong>Crowdsale ended</strong></h2>
                                            <h1 class="text-center" style="margin-bottom:30px;">Thank you for participating!</h1>
                                            <h3 class="text-center">Let's revolutionize education together!</h3>
                                        @else
                                            @include('partials.ico-countdown')
                                        @endif

                                        @php($mediumCapReached = bccomp($tokensSold, bcdiv($hardCap,2)) >= 0)

                                        <div class="progress-bar-wrapper">
                                            <div class="slider-container main-slider">
                                                <div class="soft-cap reached annotation">
                                                    <span>1. Soft Cap: reached</span>
                                                    <span class="marker"></span>
                                                    <span class="marker marker-front"></span>
                                                </div>
                                                <div class="medium-cap {{ $mediumCapReached ? "reached" : "" }} annotation">
                                                    <span>2. Half Hard Cap: {{ $mediumCapReached ? "reached" : "in progress" }}</span>
                                                    <span class="marker"></span>
                                                </div>
                                                <div class="hard-cap {{ $hardCapReached ? "reached" : ($mediumCapReached ? "current" : "") }} annotation">
                                                    <span>3. Hard Cap: {{ $hardCapReached ? "reached" : number_format($hardCap)." BDG" }}</span>
                                                    <span class="marker"></span>
                                                </div>
                                                <div data-ico-main-slider style="width: {{ $progress }}%;" class="slider"></div>
                                            </div>
                                            <div class="slider-container milestone-slider">
                                                <div class="milestone annotation">
                                                    <span class="marker"></span>
                                                    <span class="marker marker-front"></span>
                                                </div>
                                                <div data-ico-milestone-slider class="slider {{ $hardCapReached ? "no-pulse" : "" }}" style="width: {{ $milestoneProgress }}%;">
                                                    <div class="pulse"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="progress-values">
                                            @php($milestoneInMillions = bcdiv($nextMilestone, bcpow(10,6))-1)
                                            @php($hardCapInMillions = bcdiv($hardCap, bcpow(10,6)))
                                            <div class="stage">Stage: <span data-ico-milestone>{{ $milestoneInMillions }}M</span> of {{ $hardCapInMillions }}M</div>
                                            <div class="main-progress">
                                                Progress: <strong data-ico-tokens-sold>{{ number_format($tokensSold) }}</strong> BDG
                                            </div>
                                        </div>


                                        @if(!$hardCapReached)
                                            <div class="bonuses-table">
                                                <h4 class="text-center">@lang('ico.receive')</h4>
                                            </div>
                                        @endif

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="communicate">
                        <div class="contact">
                            @auth
                                <a class="cta-btn" href="{{ route('address') }}">@lang(config('ico.start')->isFuture() ? 'ico.join-now-c2a' : ($hardCapReached ? 'ico.join-now-c2a' : 'ico.get-tokens-now'))</a>
                            @endauth
                            @guest
                                <a class="cta-btn" href="{{ route('register') }}">@lang(config('ico.start')->isFuture() ? 'ico.join-now-c2a' : ($hardCapReached ? 'ico.join-now-c2a' : 'ico.get-tokens-now'))</a>
                            @endguest
                            <div class="contact-icons buttons">
                                <a class="contact-icon" href="https://t.me/bitdegree" rel="nofollow" target="_blank"><img src="{{ asset_rev('telegram-logo.png') }}" alt="Telegram"></a>
                                <a class="contact-icon" href="https://twitter.com/bitdegree_org" rel="nofollow" target="_blank"><img src="{{ asset_rev('twitter-logo.png') }}" alt="Twitter"></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    </div>

</header>