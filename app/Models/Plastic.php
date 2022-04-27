<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plastic extends Good
{
    use HasFactory;

    protected $fillable = [
        'id',
        'biodigration_time',
        'toxic_spread_emission',
        'polyethylene_density'
    ];

    protected $dates = ['consume_date'];
}
