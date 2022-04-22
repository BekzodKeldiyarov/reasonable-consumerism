<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Plastic
{
    use HasFactory;

    protected $fillable = [
        'id',
        'size'
    ];
}
