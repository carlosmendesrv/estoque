<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait Asks
{
    /**
     * @param $args
     * $args[0] = ask_1 = quantity
     * $args[1] = ask_2 = password
     */
    private static function createUser($args)
    {
        User::factory()->count($args[0])->create([
            'password' => Hash::make($args[1])
        ]);

        User::create([
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'name' => 'Admin',
            'email_verified_at' => now(),
        ]);
    }


}
