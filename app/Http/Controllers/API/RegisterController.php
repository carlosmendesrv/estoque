<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\RegisterRequest\CreateRequest;
use App\Services\API\RegisterService\StoreRegisterService;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    public function store(CreateRequest $request): JsonResponse
    {
        return StoreRegisterService::execute($request->all());
    }
}
