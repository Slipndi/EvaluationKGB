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
        'statut_id',
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
        return $this->belongsTo(Speciality::class, 'speciality_id');
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
     * @return hasMany
     */
    public function missionHideouts() : HasMany {
        return $this->hasMany(MissionHideout::class, 'mission_id');
    }

    /**
     * Une mission a plusieurs entrées dans la table missionPersonnes
     *
     * @return hasManys
     */
    public function missionPersons() : HasMany {
        return $this->hasMany(MissionPerson::class, 'mission_id');
    }

    /**
     * Une mission a plusieurs personnes
     *
     * @return BelongsToMany
     */
    public function persons() : BelongsToMany {
        return $this->belongsToMany(Person::class);
    }
    
    /**
     * Une mission peut avoir plusieurs planque
     *
     * @return BelongsToMany
     */
    public function hideouts() : BelongsToMany {
        return $this->belongsToMany(Hideout::class);
    }



}
