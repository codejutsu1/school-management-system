<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'slug',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function parents()
    {
        return $this->hasOne(Parent::class);
    }

    public function teachers()
    {
        return $this->hasOne(Teacher::class);
    }

    public function Jss1()
    {
        return $this->hasOne(Jss1::class);
    }

    public function biology()
    {
        return $this->hasOne(Biology::class);
    }
    public function english()
    {
        return $this->hasOne(English::class);
    }

    public function mathematics()
    {
        return $this->hasOne(Mathematics::class);
    }

    public function chemistry()
    {
        return $this->hasOne(Chemistry::class);
    }

    public function physics()
    {
        return $this->hasOne(Physics::class);
    }
}
