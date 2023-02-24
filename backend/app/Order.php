<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "name", "description", "design_code", "photo",  "status"
    ];
}
