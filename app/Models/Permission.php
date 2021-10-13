<?php

namespace App\Models;

use App\Traits\Uuid;

class Permission extends \Spatie\Permission\Models\Permission
{
    use Uuid;

    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $casts = [
        'id' => 'string'
    ];
}
