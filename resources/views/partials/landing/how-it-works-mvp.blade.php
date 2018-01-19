<div id="mvp" class="how-it-works mvp main light-violet-bkg">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-10 col-md-push-1 text-center">
                <div class="title-container">
                    <h2 class="title">@lang('home.mvp_title')</h2>
                    <h3 class="subtitle">@lang('home.mvp_subtitle')</h3>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="{{ route('mvp') }}">
                <img src="{{ asset_rev('mvp-image.png') }}" style="width:600px;" alt="@lang('home.mvp_image_alt')">
            </a>
        </div>

        <div class="mvp-cta text-center">
            <a href="{{ route('mvp') }}" class="cta-btn">@lang('home.mvp_c2a')</a>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <p>@lang('home.mvp_description')</p>
            </div>

        </div>
    </div>
</div>