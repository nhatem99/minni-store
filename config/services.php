<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '839267528002-h999770jr43187mjgpi6m11rcun23tfg.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://minni-store.online/auth/google/callback'
    ],
    'facebook' => [
        'client_id' => '886345786339880',
        'client_secret' => '77446c0ee1896216fd6775e071e08d20',
        'redirect' => 'http://your-callback-url',
    ],        
];
