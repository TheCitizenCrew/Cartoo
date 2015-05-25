<?php

return [
	'table' => 'oauth_identities',
	'providers' => [
		'facebook' => [
			'id' => env('OAUTH_FACEBOOK_APPID'),
			'secret' => env('OAUTH_FACEBOOK_SECRET'),
			'redirect' => env('OAUTH_FACEBOOK_REDIRECT'),
			'scope' => [],
		],
		'google' => [
			'id' => env('OAUTH_STRAVA_APPID'),
			'secret' => env('OAUTH_GOOGLE_SECRET'),
			'redirect' => env('OAUTH_GOOGLE_REDIRECT'),
			'scope' => [],
		],
		'github' => [
			'id' => env('OAUTH_GITHUB_APPID'),
			'secret' => env('OAUTH_GITHUB_SECRET'),
			'redirect' => env('OAUTH_GITHUB_REDIRECT'),
			'scope' => [],
		],
		'linkedin' => [
			'id' => env('OAUTH_LINKEDIN_APPID'),
			'secret' => env('OAUTH_LINKEDIN_SECRET'),
			'redirect' => env('OAUTH_LINKEDIN_REDIRECT'),
			'scope' => [],
		],
		'instagram' => [
			'id' => env('OAUTH_INSTAGRAM_APPID'),
			'secret' => env('OAUTH_INSTAGRAM_SECRET'),
			'redirect' => env('OAUTH_INSTAGRAM_REDIRECT'),
			'scope' => [],
		],
		'soundcloud' => [
			'id' => env('OAUTH_SOUNDCLOUD_APPID'),
			'secret' => env('OAUTH_SOUNDCLOUD_SECRET'),
			'redirect' => env('OAUTH_SOUNDCLOUD_REDIRECT'),
			'scope' => [],
		],
		'strava' => [
			'id' => env('OAUTH_STRAVA_APPID'),
			'secret' => env('OAUTH_STRAVA_SECRET'),
			'redirect' => env('OAUTH_STRAVA_REDIRECT'),
			'scope' => [],
		],
	],
];
