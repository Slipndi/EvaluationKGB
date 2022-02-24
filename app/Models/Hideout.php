<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany, HasMany};

class Hideout extends Model
{
    use HasFactory;

    protected $fillable = [
        'address', 
        'country_id',
        'type'
    ];

    /**
     * Une planque appartient à un pays, mais un pays peut avoir plusieurs planques
     *
     * @return BelongsTo
     */
    public function country() : BelongsTo {
        return $this->belongsTo(Country::class);
    }

    /**
     * Une mission peut avoir plusieurs planques
     *
     * @return HasMany
     */
    public function missionHideouts() : HasMany {
        return $this->hasMany(MissionHideout::class);
    }
    
    /**
     * une plaqune peut avoir plusieurs mission
     */
    public function missions() : BelongsToMany {
        return $this->belongsToMany(Mission::class);
    }

}
