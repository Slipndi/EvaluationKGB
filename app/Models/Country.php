<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'nationality'
    ];

    /**
     * Un pays peut avoir plusieurs personnes
     *
     * @return HasMany
     */
    public function persons() : HasMany {
        return $this->hasMany(Person::class);
    }

    /**
     * Un pays peut avoir plusieurs planques
     *
     * @return HasMany
     */
    public function hideouts() : HasMany {
        return $this->hasMany(Hideout::class);
    }

        /**
     * Un pays peut avoir plusieurs missions
     *
     * @return HasMany
     */
    public function missions() : HasMany {
        return $this->hasMany(Mission::class);
    }
}
