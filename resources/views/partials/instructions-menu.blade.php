<div class="col-sm-3 col-md-2 hidden-xs-down sidebar">
    <h4>@lang('ico-instructions.how-to-participate')</h4>
    <ul class="sidebar-nav">
        <li class="{{ current_route_class('participate') }} instructions"><a href="{{ route('participate') }}">1. @lang('ico-instructions.article-get-wallet')</a></li>
        <li class="{{ current_route_class('participate2') }} instructions"><a href="{{ route('participate2') }}">2. @lang('ico-instructions.article-get-eth')</a></li>
        <li class="{{ current_route_class('participate4') }} instructions"><a href="{{ route('participate4') }}">3. How to get BDG tokens with ETH</a></li>
        <li class="{{ current_route_class('participate5') }} instructions"><a href="{{ route('participate5') }}">4. How to check my BDG tokens</a></li>
        <li class="{{ current_route_class('participate3') }} instructions"><a href="{{ route('participate3') }}">@lang('ico-instructions.article-get-tokens')</a></li>
        <li class="{{ current_route_class('participatefaq') }} instructions"><a href="{{ route('participatefaq') }}">@lang('ico-instructions.article-faq')</a></li>
    </ul>
</div>