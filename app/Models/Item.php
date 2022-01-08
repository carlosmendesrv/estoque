<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'box_qtd', 'box_suggestion','request_id', 'code', 'invetory_qtd', 'status_product', 'status_request','description'
    ];

    public function request(){
        return $this->BelongsTo(Request::class);
    }
}
