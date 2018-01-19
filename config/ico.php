<?php

$startTime = \Carbon\Carbon::createFromTimestamp(env('ICO_STARTS_AT', 0));
$endTime = \Carbon\Carbon::createFromTimestamp(env('ICO_ENDS_AT', 0));

return [
    'active' => (bool) env('ICO_INFO_AVAILABLE', false),
    'address' => env('ICO_ADDRESS'),
    'start' => $startTime,
    'end' => $endTime,
    'started' => $startTime->isPast(),
    'ended' => $endTime->isPast(),
    'rate' => env('ICO_RATE'),
    'hardCap' => env('ICO_HARD_CAP'),
    'softCap' => env('ICO_SOFT_CAP'),
    'decimals' => 18,
    'bonuses' => [
        [
            'name' => 'ico.bonus_1',
            'from' => $startTime->copy(),
            'to' => $startTime->copy()->addWeeks(1)->subSecond(),
            'bonus' => 1.15,
        ],
        [
            'name' => 'ico.bonus_2',
            'from' => $startTime->copy()->addWeek(1),
            'to' => $startTime->copy()->addWeeks(2)->subSecond(),
            'bonus' => 1.10,
        ],
        [
            'name' => 'ico.bonus_3',
            'from' => $startTime->copy()->addWeeks(2),
            'to' => $startTime->copy()->addWeeks(3)->subSecond(),
            'bonus' => 1.05,
        ]
    ],
    'call_data' => env('ICO_CALL_DATA', '0x'),
];