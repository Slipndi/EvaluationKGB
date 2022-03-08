<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany, HasMany};

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id', 
        'first_name',
        'last_name',
        'birthdate',
        'code_name',
        'picture',
        'role_id',
    ];

    protected $table ='persons';
    
    /**
     * Chaque personne appartient à un pays
     *
     * @return BelongsTo
     */
    public function country() : BelongsTo {
        return $this->belongsTo(Country::class, 'country_id');
    }

    /**
     * Chaque personne à un rôle
     *
     * @return boolean
     */
    public function role() : BelongsTo {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /**
     * Plusieurs personnes, peuvent avoir une ou plusieurs  missions
     *
     * @return HasMany
     */
    public function missionsPersons() : HasMany {
        return $this->hasMany(MissionPerson::class);
    }

    /**
     * Une personne peut avoir plusieurs missions
     *
     * @return BelongsToMany
     */
    public function missions() : BelongsToMany {
        return $this->belongsToMany(Mission::class);
    }

    /**
     * Plusieurs personnes, peuvent avoir une ou plusieurs  spécialitées
     *
     * @return HasMany
     */
    public function personSpecialities() : HasMany {
        return $this->hasMany(PersonSpeciality::class);
    }

    /**
     * Une personne peut avoir plusieurs Spécialités
     *
     * @return BelongsToMany
     */
    public function specialities() : BelongsToMany {
        return $this->belongsToMany(Speciality::class);
    }

    
}
