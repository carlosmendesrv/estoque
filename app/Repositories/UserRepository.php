<?php

namespace App\Repositories;

use App\Models\User;
use function PHPUnit\Framework\matches;

class UserRepository
{
    public static function create($data)
    {
        return User::create($data);
    }

    public static function getByEmail($email)
    {
        return User::where('email', $email)->first();
    }
}
