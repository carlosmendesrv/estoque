<?php

namespace App\Models;

use App\Traits\Uuid;

class Role extends \Spatie\Permission\Models\Role
{
    use Uuid;
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $casts = [
        'id' => 'string'
    ];
}
