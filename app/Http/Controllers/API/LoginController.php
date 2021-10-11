<?php

namespace App\Http\Controllers\API;

use App\Services\API\LoginServices\StoreLoginService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController
{
    public function store(Request $request): JsonResponse
    {
        return StoreLoginService::execute($request->all());
    }
}
