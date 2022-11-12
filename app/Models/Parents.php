<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parents extends Model
{
    use HasFactory;
    use BelongsToUser;

    protected $table = 'parents';

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
