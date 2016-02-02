<?php

use App\User;

return [
    'model' => User::class,
    'table' => 'oauth_identities',
    'providers' => [
        'facebook' => [
            'client_id' => env('OAUTH_FACEBOOK_APPID', '12345678'),
            'client_secret' => env('OAUTH_FACEBOOK_SECRET', '12345678'),
            'redirect_uri' => env('OAUTH_FACEBOOK_REDIRECT', 'https://example.com/your/facebook/redirect'),
            'scope' => [],
        ],
        'google' => [
            'client_id' => env('OAUTH_GOOGLE_APPID', '12345678'),
            'client_secret' => env('OAUTH_GOOGLE_APPID', '12345678'),
            'redirect_uri' => env('OAUTH_GOOGLE_REDIRECT', 'https://example.com/your/google/redirect'),
            'scope' => [],
        ],
        'github' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/github/redirect',
            'scope' => [],
        ],
        'linkedin' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/linkedin/redirect',
            'scope' => [],
        ],
        'instagram' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/instagram/redirect',
            'scope' => [],
        ],
        'soundcloud' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/soundcloud/redirect',
            'scope' => [],
        ],
    ],
];
