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

    'facebook' => [
    'client_id' => '520441001452914',
    'client_secret' => '12fc1ad100b62b6560353a01c61b6d85',
    'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],

    'twitter' => [
    'client_id' => '8RCikYVE0WKUhDT1nbYupjNft',
    'client_secret' => 'BzL0q7hbkePOVGscOCvvA3M0sHMuq4MxUKPSiWL5cpOybXuqLW',
    'redirect' => 'http://localhost:8000/login/twitter/callback',
    ],
    
    'google' => [
    'client_id' => '769393457462-p0k7m5v29ut9lof2jdkpcv6kvvu03q7m.apps.googleusercontent.com',
    'client_secret' => '9ztTP7ZzxfMjY65gnjiWYqI2',
    'redirect' => 'http://localhost:8000/login/google/callback',
    ],

    'linkedin' => [
    'client_id' => '77x056ut8xjrju',
    'client_secret' => 'm7CBHv0Ub4g7LwTE',
    'redirect' => 'http://localhost:8000/login/linkedin/callback',
    ],

];
