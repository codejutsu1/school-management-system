<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chemistry extends Model
{
    use HasFactory;

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
