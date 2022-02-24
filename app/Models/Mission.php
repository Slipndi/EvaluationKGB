<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{ BelongsTo, BelongsToMany, HasMany};

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description',
        'code_name',
        'country_id',
        'type',
        'mission_statut_id',
        'speciality_id',
        'start_date',
        'end_date'
    ];

    /**
     * Une mission requiert une spécialité
     *
     * @return BelongsTo
     */
    public function speciality() : BelongsTo {
        return $this->belongsTo(Speciality::class);
    }

    /**
     * Une mission requiert un statut
     *
     * @return BelongsTo
     */
    public function statut() : BelongsTo {
        return $this->belongsTo(Statut::class);
    }

    /**
     * Une mission ne se déroule que dans un pays
     *
     * @return BelongsTo
     */
    public function country() : BelongsTo {
        return $this->belongsTo(Country::class);
    }

    /**
     * Une mission peut avoir zéro ou plusieurs planques
     *
     * @return BelongsToMany
     */
    public function missionHideouts() : BelongsToMany {
        return $this->belongsToMany(MissionHideout::class);
    }

    /**
     * Une mission a plusieurs entrées dans la table missionPersonnes
     *
     * @return BelongsToMany
     */
    public function missionsPersons() : HasMany {
        return $this->hasMany(MissionPerson::class);
    }

    /**
     * Une mission a plusieurs personnes
     *
     * @return HasMany
     */
    public function persons() : HasMany {
        return $this->hasMany(Person::class);
    }
    
    /**
     * Une mission peut avoir plusieurs planque
     *
     * @return HasMany
     */
    public function hideouts() : HasMany {
        return $this->hasMany(Hideout::class);
    }



}
