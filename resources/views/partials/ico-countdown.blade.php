@if($currentBonus)
    <h1>@lang('home.join_crowdsale_main_header')</h1>
    @include('partials.countdown', ['timeLeft' => $currentBonus['to']->diffInSeconds()])
@else
    <h1>@lang('ico.ends-in')</h1>
    @include('partials.countdown', ['timeLeft' => config('ico.end')->isPast() ? 0 : config('ico.end')->diffInSeconds()])
@endif