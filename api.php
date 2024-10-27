<?php
// php artisan install:api Or composer require tymon/jwt-auth
// php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
// php artisan jwt:secret
use Tymon\JWTAuth\Contracts\JWTSubject; // implements in model
//in model
// public function getJWTIdentifier()
// {
//     return $this->getKey();
// }

// public function getJWTCustomClaims()
// {
//     return [];
// }
[
    'defaults' => [
    'guard' => 'api',
    'passwords' => 'users',
],

'guards' => [
    'api' => [
        'driver' => 'jwt',
        'provider' => 'users',
    ],
],

];
//  "srmklive/paypal": "*"