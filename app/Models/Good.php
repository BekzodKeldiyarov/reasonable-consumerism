<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    protected $fillable = [
        'label'
    ];

    protected $dates = ['consume_date'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'consume');
    }
}
