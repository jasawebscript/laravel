<div id="statistics" class="main white-bkg">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-push-2 text-center">
                <div class="title-container">
                    <h2 class="title">@lang('home.moocs_headline')</h2>
                    <h3 class="subtitle">@lang('home.moocs_subtitle')</h3>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 description">
                <div class="image-container text-center">
                    @if($currentLanguage == "cn")
                        <img src="{{ asset_rev('moocs-cn.jpg') }}" alt="@lang('home.moocs_headline')">
                    @elseif($currentLanguage == "ru")
                        <img src="{{ asset_rev('moocs-ru.jpg') }}" alt="@lang('home.moocs_headline')">
                    @else
                        <img src="{{ asset_rev('moocs.jpg') }}" alt="@lang('home.moocs_headline')">
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 description">
                <div class="description-container">
                    <p>@lang('home.moocs_description')</p>
                </div>
            </div>
        </div>
    </div>
</div>