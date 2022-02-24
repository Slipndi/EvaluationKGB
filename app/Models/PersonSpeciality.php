<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonSpeciality extends Model
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
    public function person() : BelongsTo {
        return $this->belongsTo(Person::class);
    }
    
    /**
     * Crée le liens entre HIDEOUTS et MISSIONS
     *
     * @return BelongsTo
     */
    public function mission() : BelongsTo {
        return $this->belongsTo(Mission::class);
    }
}
