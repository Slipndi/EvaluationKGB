<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonSpeciality extends Model
{
    use HasFactory;

    protected $fillable = [
        'speciality_id',
        'person_id'
    ];

    protected $table = 'person_speciality';

    public function person() : BelongsTo {
        return $this->belongsTo(Person::class);
    }

    public function speciality() : BelongsTo {
        return $this->belongsTo(Speciality::class);
    }
}
