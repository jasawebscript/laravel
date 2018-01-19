<div class="countdown" data-time-left="{{ $timeLeft }}">
    <div class="time-amount">
        <span class="time-left-days">{{ floor($timeLeft / 60 / 60 / 24) }}</span>
        <span class="time-value">@lang('ico.countdown-days')</span>
    </div>:
    <div class="time-amount">
        <span class="time-left-hours">{{ str_pad(floor($timeLeft / 60 / 60) % 24, 2, 0, STR_PAD_LEFT) }}</span>
        <span class="time-value">@lang('ico.countdown-hours')</span>
    </div>:<div class="time-amount">
        <span class="time-left-minutes">{{ str_pad(floor($timeLeft / 60) % 60, 2, 0, STR_PAD_LEFT) }}</span>
        <span class="time-value">@lang('ico.countdown-minutes')</span>
    </div>:<div class="time-amount">
    <span class="time-left-seconds">{{ str_pad($timeLeft % 60, 2, 0, STR_PAD_LEFT) }}</span>
        <span class="time-value">@lang('ico.countdown-seconds')</span>
    </div>
</div>