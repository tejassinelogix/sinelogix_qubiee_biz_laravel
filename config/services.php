<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '118247732441961',         // Your Facebook Client ID
        'client_secret' => 'da7fd1cee9c90f264cbb3c4339e566e5', // Your Facebook Client Secret
        'redirect' => 'https://xtacky.com/auth/facebook/callback',
    ],

    'google' => [
        'client_id'     => '159496500620-oka132tmjorl8lfglu3k3c8g4n3psmiu.apps.googleusercontent.com',      // Your Google Client ID
        'client_secret' => 'IzphMaFd66jM6nlKAnKevIiI',      // Your Google Client Secret
        'redirect'      => 'https://xtacky.com/auth/google/callback',
    ],

];
