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
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
    'client_id' => '571486943750-c4cobaa05enuaqbc552f8heo2d867tu1.apps.googleusercontent.com',     
    // google Client ID
    'client_secret' => 'FhIVOsGhW4pqjMRPy_HwK0PY', // google Client Secret
    'redirect' => 'http://portalmedia.mtics.net/login/google/callback',
    ],


 /*   'facebook' => [
    'client_id' => '260144797862121',         // facebook Client ID
    'client_secret' => '45fe276ddc9a657e821b765eb47b8c9f', // facebook Client Secret
    'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],*/

];
