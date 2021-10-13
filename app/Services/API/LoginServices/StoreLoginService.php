<?php

namespace App\Services\API\LoginServices;

use App\Repositories\JWTRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class StoreLoginService
{
    public static function execute($data): JsonResponse
    {
        $user = UserRepository::getByEmail($data['email']);

        if ($user && Hash::check($data['password'], $user->password))
        {
            $payload = [
                'data' => [
                    'user' => $user,
                    'access_token' => JWTRepository::encode($user)
                ]
            ];

            return response()->json($payload, 200);
        }

        $payload = [
            'message' => 'Invalid credentials'
        ];

        return response()->json($payload, 401);
    }
}
