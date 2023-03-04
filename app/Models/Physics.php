<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Physics extends Model
{
    use HasFactory;
    use BelongsToUser;

    protected $table = 'physics';

    protected $fillable = [
        'user_id',
        'class',
        'first_ca',
        'second_ca',
        'exam',
        'total',
        'session',
        'teachers_name'
    ];
}


