<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
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
        'formClass',
        'extraCurriculumActivities',
        'department',
        'house',
        'hod',
        'session',
        'complete'
    ];
}
