<?php

namespace App\Http\Middleware;

use App\Repositories\JWTRepository;
use App\Repositories\UserRepository;
use Closure;
use Exception;
use Illuminate\Http\Request;

class JWT
{
    public function handle(Request $request, Closure $next)
    {
        try {
            if (! $request->hasHeader('Authorization'))
            {
                throw new Exception('Unauthorized');
            }

            $token = str_replace(' Bearer', '', $request->header('Authorization'));
            $decoded = JWTRepository::decode($token);
            $user = UserRepository::getByEmail($decoded->email);

            if (! $user)
            {
                throw new Exception('Unauthorized');
            }

            return $next($request);
        } catch (Exception $exception) {
            return responseException($exception, 401, 'Unauthorized');
        }
    }
}
