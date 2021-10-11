<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\RegisterRequest\CreateRequest;
use App\Services\API\RegisterService\StoreRegisterService;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    /**
     * @OA\Post(
     *     tags={"/register"},
     *     summary="Register",
     *     description="Register a user",
     *     path="/register",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property (property="name", type="string", minimum="3", maximum="80"),
     *             @OA\Property (property="email", type="string"),
     *             @OA\Property (property="password", type="string", minimum="4", maximum="28"),
     *         )
     *     ),
     *     @OA\Response(
     *         response="201", description="Created",
     *     )
     * )
     */
    public function store(CreateRequest $request): JsonResponse
    {
        return StoreRegisterService::execute($request->all());
    }
}
