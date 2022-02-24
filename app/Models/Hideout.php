<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hideout extends Model
{
    use HasFactory;

    protected $fillable = [
        'address', 
        'country_id',
        'type'
    ];
}
