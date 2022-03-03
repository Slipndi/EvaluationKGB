<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    /**
     * Plusieurs personnes peuvent avoir le même rôle
     *
     * @return HasMany
     */
    public function persons() : HasMany {
        return $this->hasMany(Person::class, 'role_id');
    }
}
