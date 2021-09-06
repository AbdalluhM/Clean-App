<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// sanctum
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $appends = ['user_image_path'];
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'phone',
        'fcm_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function address(){
        return $this->hasOne(address::class);
    }
    public function recieves(){
        return $this->hasMany(Recieve::class);
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    public function socials(){
        return $this->hasMany(Social::class,'user_id');
    }
    public function payments(){
        return $this->hasMany(Payment::class);
    }
    public function getUserImagePathAttribute()
    {
        return asset('storage/images/users/' . ($this->image));
    }
}
