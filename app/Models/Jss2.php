<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jss2 extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','session', 'classes', 'total', 'average'];
}
