<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $connection = 'mysql';

    protected $fillable = ['store', 'status'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
