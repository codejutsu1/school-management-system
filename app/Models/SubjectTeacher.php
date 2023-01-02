<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectTeacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'classes'
    ];

    protected $casts = [
        'classes' => 'array',
    ];

    
}
