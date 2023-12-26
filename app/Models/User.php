<?php

namespace App\Models;

use App\SOLID\Traits\FileTraits;
use Hootlex\Friendships\Traits\Friendable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Friendable;
    use FileTraits;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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
        'password' => 'hashed',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function setImageAttribute($value){
        $this->attributes['image'] = $this->uploadFile($value,'uploads/users');
    }

    public function provider(){
        return $this->hasMany(Provider::class);
    }
}
