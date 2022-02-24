<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    protected $table ='persons';
    
    /**
     * Chaque personne appartient à un pays
     *
     * @return BelongsTo
     */
    public function country() : BelongsTo {
        return $this->belongsTo(Country::class);
    }

    /**
     * Chaque personne à un rôle
     *
     * @return boolean
     */
    public function role() : BelongsTo {
        return $this->belongsTo(Role::class);
    }

    
}
