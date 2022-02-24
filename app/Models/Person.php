<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id', 
        'first_name',
        'last_name',
        'birthdate',
        'code_name',
        'role_id',
    ];

    protected $table ='People';
}
