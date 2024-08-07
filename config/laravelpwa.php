<?php

return [
    'name' => 'LaravelPWA',
    'manifest' => [
        'name' => env('APP_NAME', 'My PWA App'),
        'short_name' => 'PRO | AllesServiços',
        'start_url' => '/',
        'background_color' => '#fcfcfc',
        'theme_color' => '#003276',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> '#003276',
        'icons' => [
            '72x72' => [
                'path' => '/assets/image/logo_brand.svg',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/assets/image/logo_brand.svg',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/assets/image/logo_brand.svg',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/assets/image/logo_brand.svg',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/assets/image/logo_brand.svg',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/assets/image/logo_brand.svg',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/assets/image/logo_brand.svg',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/assets/image/logo_brand.svg',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/assets/image/logo_brand.svg',
            '750x1334' => '/assets/image/logo_brand.svg',
            '828x1792' => '/assets/image/logo_brand.svg',
            '1125x2436' => '/assets/image/logo_brand.svg',
            '1242x2208' => '/assets/image/logo_brand.svg',
            '1242x2688' => '/assets/image/logo_brand.svg',
            '1536x2048' => '/assets/image/logo_brand.svg',
            '1668x2224' => '/assets/image/logo_brand.svg',
            '1668x2388' => '/assets/image/logo_brand.svg',
            '2048x2732' => '/assets/image/logo_brand.svg',
        ],
        'shortcuts' => [
            [
                'name' => 'DevStep Studio.',
                'description' => 'Desenvolvedora do website PWA',
                'url' => 'devstep.com.br',
                'icons' => [
                    "src" => "/assets/image/devstep.png",
                    "purpose" => "any"
                ]
            ],
        ],
        'custom' => []
    ]
];
