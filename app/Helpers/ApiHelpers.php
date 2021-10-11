<?php

function responseException(Exception $exception, int $status, string $message = null): \Illuminate\Http\JsonResponse
{
    $payload = [
        'message' => $message,
        'data' => [
            'message' => $exception->getMessage(),
            'file' => $exception->getFile()
        ]
    ];

    return response()->json($payload, $status);
}
