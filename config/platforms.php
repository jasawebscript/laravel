<?php

return [
    'solidity' => [
        'name' => 'BitDegree Solidity Course',
        'audience' => env('PLATFORM_SOLIDITY_URL', 'http://localhost:4000'),
        'redirect' => env('PLATFORM_SOLIDITY_REDIRECT', 'http://localhost:4000/#auth:{token}'),
    ]
];