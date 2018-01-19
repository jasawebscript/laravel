<div class="top-info-container">
    <div class="top-text-container">
        @if(config('ico.start')->isFuture())
            <a href="#subscribe-for-updates">
                <p>@lang('home.ico_top_information')</p>
            </a>
        @else
            <a href="#subscribe-for-updates">
                <p>@lang('home.ico_top_information_2')</p>
            </a>
        @endif

    </div>
</div>