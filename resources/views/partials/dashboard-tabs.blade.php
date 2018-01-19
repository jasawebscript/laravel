
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse dashboard-navigation" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav nav-tabs">
                @if(config('ico.started'))
                    <li class="{{ current_route_class('address') }}"><a href="{{ route('address') }}"><img class="token" src="{{ asset_rev('token-img.png') }}" alt="BitDegree Token"> @lang('user.tab-crowdsale')</a></li>
                @endif
                <li class="{{ current_route_class('participate') }} hidden"><a href="{{ route('participate') }}"><i class="fa fa-question-circle" aria-hidden="true"></i> @lang('user.tab-how')</a></li>
                    <li class="dropdown">
                        <a href="{{ route('participate') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-question-circle" aria-hidden="true"></i> @lang('user.tab-how') <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="{{ current_route_class('participate') }} instructions"><a href="{{ route('participate') }}">1. @lang('ico-instructions.article-get-wallet')</a></li>
                            <li class="{{ current_route_class('participate2') }} instructions"><a href="{{ route('participate2') }}">2. @lang('ico-instructions.article-get-eth')</a></li>
                            <li class="{{ current_route_class('participate4') }} instructions"><a href="{{ route('participate4') }}">3. How to get BDG tokens with ETH</a></li>
                            <li class="{{ current_route_class('participate5') }} instructions"><a href="{{ route('participate5') }}">4. How to check my BDG tokens</a></li>
                            <li class="{{ current_route_class('participate3') }} instructions"><a href="{{ route('participate3') }}">@lang('ico-instructions.article-get-tokens')</a></li>
                            <li class="{{ current_route_class('participatefaq') }} instructions"><a href="{{ route('participatefaq') }}">@lang('ico-instructions.article-faq')</a></li>
                        </ul>
                    </li>

                <li class="{{ current_route_class('affiliate') }} hidden"><a href="{{ route('affiliate') }}"><i class="fa fa-star" aria-hidden="true"></i> @lang('user.tab-earn')</a></li>
                <li class="dropdown">
                    <a href="{{ route('affiliate') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-star" aria-hidden="true"></i> @lang('user.tab-earn') <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="{{ current_route_class('affiliate') }} instructions"><a href="{{ route('affiliate') }}">Referral link</a></li>
                        <li class="{{ current_route_class('affiliate2') }} instructions"><a href="{{ route('affiliate2') }}" >Banners</a></li>
                        <li class="{{ current_route_class('affiliate3') }} instructions"><a href="{{ route('affiliate3') }}" >My earnings</a></li>
                        <li class="{{ current_route_class('affiliate4') }} instructions"><a href="{{ route('affiliate4') }}">How it works?</a></li>
                    </ul>
                </li>
                @if(auth()->user()->isAirdropParticipant())
                    <li class="{{ current_route_class('user') }}"><a href="{{ route('user') }}"><i class="fa fa-plane" aria-hidden="true"></i> @lang('user.tab-airdrops')</a></li>
                @endif
                @if(auth()->user()->isEligibleForARefund())
                    <li class="{{ current_route_class('refund') }}"><a href="{{ route('refund') }}"><i class="fa fa-undo" aria-hidden="true"></i> Refunding for USA Citizens</a></li>
                @endif
                    <!-- .dropdown -->
            </ul> <!-- .nav .navbar-nav -->
        </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
</nav>
