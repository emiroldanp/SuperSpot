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

    'github' => [
        'client_id' => 'ece53358dc86164150d8',
        'client_secret' => '7d507908218cb6480fa5b49d8af491bef18ec455',
        'redirect' => 'http://127.0.0.1:8000/auth/callback',
    ],

    'google' => [
        'client_id' => '614293679018-srn1ndtdr5ip1eju4jd0228c0414qg2f.apps.googleusercontent.com',
        'client_secret' => 'GV6T9xPN4DhPO1t-7cG2a29c',
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback',
    ],

];
