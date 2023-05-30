<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
        'v_code',
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

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }



    public function requestbook()
    {
        return $this->hasMany(BookRequest::class);
    }

    public function researchSupervisions()
    {
        return $this->hasMany(ResearchSupervision::class);
    }
    public function Teaching()
    {
        return $this->hasMany(Teaching::class);
    }
    public function education()
    {
        return $this->hasMany(Education::class);
    }
    public function Publication()
    {
        return $this->hasMany(Publication::class);
    }
    public function Award()
    {
        return $this->hasMany(Award::class);
    }
    public function Membership()
    {
        return $this->hasMany(Membership::class);
    }
}
