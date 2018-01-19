<div id="demand-forecast" class="main white-bkg">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <div class="title-container">
                    <h2 class="title">@lang('home.demand_title')</h2>
                    <h3 class="subtitle">@lang('home.demand_subtitle')</h3>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 description">
                <div class="image-container text-center">
                    @if($currentLanguage == "cn")
                        <img src="{{ asset_rev('jobs-graph-cn.jpg') }}" alt="@lang('home.demand_image_alt')">
                    @elseif($currentLanguage == "ru")
                        <img src="{{ asset_rev('jobs-graph-ru.jpg') }}" alt="@lang('home.demand_image_alt')">
                    @else
                        <img src="{{ asset_rev('jobs-graph.jpg') }}" alt="@lang('home.demand_image_alt')">
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 description">
                <div class="description-container">
                    <p>@lang('home.demand_description')</p>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>