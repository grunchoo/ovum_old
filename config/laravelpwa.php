<?php

return [
    'name' => 'Ovum',
    'manifest' => [
        'name' => env('APP_NAME', 'Ovum'),
        'short_name' => 'OVUM',
        'start_url' => '/',
        'background_color' => '#696969',
        'theme_color' => '#696969',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'gray',
        'icons' => [
            '192x192' => [
                'path' => '/images/icons/manifest-icon-192x192.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/images/icons/manifest-icon-512x512.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/images/icons/apple-splash-dark-640x1136.png',
            '750x1334' => '/images/icons/apple-splash-dark-750x1334.png',
            '828x1792' => '/images/icons/apple-splash-dark-828x1792.png',
            '1125x2436' => '/images/icons/apple-splash-dark-1125x2436.png',
            '1242x2208' => '/images/icons/apple-splash-dark-1242x2208.png',
            '1242x2688' => '/images/icons/apple-splash-dark-1242x2688.png',
            '1536x2048' => '/images/icons/apple-splash-dark-1536x2048.png',
            '1668x2224' => '/images/icons/apple-splash-dark-1668x2224.png',
            '1668x2388' => '/images/icons/apple-splash-dark-1668x2388.png',
            '2048x2732' => '/images/icons/apple-splash-dark-2048x2732.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/images/icons/icon-72x72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
        'custom' => []
    ]
];
