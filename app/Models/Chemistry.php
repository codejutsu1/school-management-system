<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chemistry extends Model
{
    use HasFactory;
    use BelongsToUser;

    protected $table = 'Chemistry';

    protected $fillable = [
        'user_id',
        'class',
        'first_ca',
        'second_ca',
        'exam',
        'session',
        'teachers_name'
    ];
}
