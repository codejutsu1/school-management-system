<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    use BelongsToUser;

    protected $fillable = [
        'user_id',
        'dob',
        'state',
        'lga',
        'religion',
        'documents',
        'profilePics',
        'class',
        'extraCurriculumActivities',
        'house',
        'prefect',
        'extraActivitesPrefect',
        'session'
    ];

    public function class(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value)
        );
    }

    public function parents()
    {
        return this->hasOne(Parents::class);
    }
}
