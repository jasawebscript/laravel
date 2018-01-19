@include('partials.landing.token-facts')

<div class="token-graphs main white-bkg">
    <div class="container">
        <div class="token-distribution">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-push-2 text-center">
                    <div class="title-container">
                        <h2 class="title">@lang('home.token_distribution_title')</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 description">
                    <div class="image-container text-center">
                        @if($currentLanguage == "cn")
                            <img src="{{ asset_rev('token-distribution-cn.png') }}" alt="@lang('home.token_distribution_title')">
                        @elseif($currentLanguage == "ru")
                            <img src="{{ asset_rev('token-distribution-ru.png') }}" alt="@lang('home.token_distribution_title')">
                        @else
                            <img src="{{ asset_rev('token-distribution2.png') }}" alt="@lang('home.token_distribution_title')">
                        @endif
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 description">
                    <div class="description-container">
                        <table>
                            <tbody>
                            <tr>@lang('home.token_distribution_text_1')</tr>
                            <tr>@lang('home.token_distribution_text_2')</tr>
                            <tr>@lang('home.token_distribution_text_3')</tr>
                            <tr>@lang('home.token_distribution_text_4')</tr>
                            <tr>@lang('home.token_distribution_text_5')</tr>
                            <tr>@lang('home.token_distribution_text_5_2')</tr>
                            <tr>@lang('home.token_distribution_text_6')</tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<hr>
        <div class="budget-allocation">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-push-2 text-center">
                    <div class="title-container">
                        <h2 class="title">@lang('home.budget_allocation_title')</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 description">
                    <div class="image-container text-center">
                        @if($currentLanguage == "cn")
                            <img src="{{ asset_rev('budget-allocation-cn.png') }}" alt="@lang('home.budget_allocation_title')">
                        @elseif($currentLanguage == "ru")
                            <img src="{{ asset_rev('budget-allocation-ru.png') }}" alt="@lang('home.budget_allocation_title')">
                        @else
                            <img src="{{ asset_rev('budget-allocation.png') }}" alt="@lang('home.budget_allocation_title')">
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>