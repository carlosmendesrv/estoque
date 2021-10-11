<?php

namespace App\Repositories;

use App\Models\User;
use Firebase\JWT\JWT;

class JWTRepository
{
    public static function encode(User $user): string
    {
        return JWT::encode(['email' => $user->email], config('api.auth_key'));
    }

    public static function decode($token): object
    {
        return JWT::decode($token, config('api.auth_key'), ['HS256']);
    }
}
