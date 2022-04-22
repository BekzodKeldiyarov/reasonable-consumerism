<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bottle extends Plastic
{
    use HasFactory;

    protected $fillable = [
        'good_id',
        'volume'
    ];
}
