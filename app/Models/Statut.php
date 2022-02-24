<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Statut extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    /**
     * Un statut peut être appliqué à plusieurs missions
     *
     * @return HasMany
     */
    public function missions() : HasMany {
        return $this->hasMany(Mission::class);
    }

}
