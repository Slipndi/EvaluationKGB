<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
     * Relation entre les tables Agents et Missions
     * il s'agit d'une relation many to many
     * 
     * @return BelongsToMany
     */
    public function agents() : BelongsToMany {
        return $this->belongsToMany(Agent::class);
    }

    /**
     * Liens entre les missions et les agents
     *
     * @return HasMany
     */
    public function mission_agent() : HasMany {
        return $this->hasMany(MissionAgent::class);
    }
}
