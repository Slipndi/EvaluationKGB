<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionPerson extends Model
{
    use HasFactory;

    protected $fillable = [
        'mission_id',
        'people_id'
    ];
}
