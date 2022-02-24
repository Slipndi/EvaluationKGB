<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MissionHideout extends Model
{
    use HasFactory;

    protected $fillable = [
        'hideout_id',
        'mission_id'
    ];

    /**
     * Crée le liens entre HIDEOUTS et MISSIONS
     *
     * @return BelongsTo
     */
    public function hideouts() : BelongsTo {
        return $this->belongsTo(Hideout::class);
    }
    
    /**
     * Crée le liens entre HIDEOUTS et MISSIONS
     *
     * @return BelongsTo
     */
    public function missions() : BelongsTo {
        return $this->belongsTo(Mission::class);
    }

}
