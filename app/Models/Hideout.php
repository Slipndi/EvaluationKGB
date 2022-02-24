<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Hideout extends Model
{
    use HasFactory;

    protected $fillable = [
        'address', 
        'country_id',
        'type'
    ];

    /**
     * Une planque appartient à 1 pays
     *
     * @return BelongsTo
     */
    public function country() : BelongsTo {
        return $this->belongsTo(Country::class);
    }

    /**
     * Une planque peut être utilisée sur plusieurs missions
     *
     * @return HasMany
     */
    public function mission_hideout() : HasMany {
        return $this->hasMany(MissionHideout::class);
    }

}
