<?php

namespace App\Services\API\RegisterService;

use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class StoreRegisterService
{
    public static function execute($data): JsonResponse
    {
        $data['password'] = Hash::make($data['password']);

        try {
            $u = UserRepository::create($data);
        } catch (Exception $exception) {
            return responseException($exception, 500);
        }

        $payload = [
            'data' => $u
        ];

        return response()->json($payload, 201);
    }
}
