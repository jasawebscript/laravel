<div id="what-are-we" class="main what-are-we white-bkg">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <div class="title-container">
                    @if(config('ico.start')->isFuture())
                        <h2 class="title">@lang('navigation.what-it-is')</h2>
                        <h3 class="subtitle">@lang('home.bitdegree_description_1')</h3>
                    @else

                        <h2 class="title">@lang('home.header_title')</h2>
                        <h3 class="subtitle">@lang('home.header_subtitle')</h3>
                        <h3 class="subtitle">@lang('home.bitdegree_description_1')</h3>
                    @endif
                </div>
                @include('partials.landing.jeff-video')
            </div>
        </div>

    </div>
</div>