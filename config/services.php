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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
    'xendit' => [
    // 'api_key' => env('XENDIT_API_KEY'),
    'api_key' => env('eG5kX2RldmVsb3BtZW50XzVVWkNWUjJwbU1vOXpqbkZLV2pER2FValNXRFdYeExVVUt0QmNJWVhsaVV5OWJxWHBvdmx1SzNHdTBpWFFDOg=='),
    'user_id' => env('XENDIT_USER_ID'),
    // 'user_id' => env('65694e8b303521a8abfbd7db'),
],

];
