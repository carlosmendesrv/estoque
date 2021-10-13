<?php

namespace App\Http\Controllers\API;

use App\Services\API\LoginServices\StoreLoginService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController
{
    /**
     * @OA\Post(
     *     tags={"/login"},
     *     summary="Login",
     *     description="Returns the user and his access_token",
     *     path="/login",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property (property="email", type="string"),
     *             @OA\Property (property="password", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response="200", description="Logged",
     *     )
     * )
     */
    public function store(Request $request): JsonResponse
    {

        return StoreLoginService::execute($request->all());
    }
}
