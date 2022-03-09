<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsToMany, HasMany};

class Speciality extends Model
{
    use HasFactory;

    protected $fillable = [
        'speciality_name'
    ];

    /**
     * Une spécialité peut être lié à plusieurs missions
     *
     * @return HasMany
     */
    public function missions() : HasMany {
        return $this->hasMany(Mission::class);
    }
    /**
     * Une spécialité peut être lié à plusieurs personnes
     */
    public function persons() : BelongsToMany {
        return $this->BelongsToMany(Personn::class);
    }

    /**
     * Plusieurs personnes peuvent avoir plusieurs spécialités
     *
     * @return HasMany
     */
    public function personsSpecialities() : HasMany {
        return $this->hasMany(PersonSpeciality::class);
    }


}
