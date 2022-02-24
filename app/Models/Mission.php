<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function mission_hideouts() : BelongsToMany {
        return $this->belongsToMany(MissionHideout::class);
    }

    /**
     * Une mission doit avoir plusieurs personnes
     *
     * @return BelongsToMany
     */
    public function mission_persons() : BelongsToMany {
        return $this->belongsToMany(MissionPerson::class);
    }




}
