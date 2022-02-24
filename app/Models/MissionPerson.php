<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MissionPerson extends Model
{
    use HasFactory;

    protected $fillable = [
        'mission_id',
        'person_id'
    ];

    /**
     * Crée le liens entre HIDEOUTS et MISSIONS
     *
     * @return BelongsTo
     */
    public function persons() : BelongsTo {
        return $this->belongsTo(Hideout::class);
    }
    
    /**
     * Crée le liens entre HIDEOUTS et MISSIONS
     *
     * @return BelongsTo
     */
    public function smissions() : BelongsTo {
        return $this->belongsTo(Mission::class);
    }

}
