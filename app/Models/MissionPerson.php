<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MissionPerson extends Model
{
    use HasFactory;

    protected $table = 'mission_person';

    protected $fillable = [
        'mission_id',
        'person_id'
    ];

    /**
    * Make relationship with Personn::class
    *
    * @return BelongsTo
    */
    public function persons() : BelongsTo {
        return $this->belongsTo(Person::class, 'person_id');
    }
    
    /**
     * Make relationship with Mission::class
     *
     * @return BelongsTo
     */
    public function missions() : BelongsTo {
        return $this->belongsTo(Mission::class, 'mission_id');
    }

}
