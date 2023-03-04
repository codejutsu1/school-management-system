<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jss1 extends Model
{
    use HasFactory;
    use BelongsToUser;

    protected $fillable = ['user_id','session', 'classes', 'total', 'average'];
}
