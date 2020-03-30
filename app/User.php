<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use Notifiable,HasApiTokens;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','address','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','status'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function realestate(){
        return $this->hasMany(App\Models\Realestate::class);
    }
    public function comment(){
        return $this->hasMany(App\Models\Comment::class);

    }
    public function reply(){
        return $this->hasMany(App\Models\Reply::class);

    }
    public function linkedSocialAccounts()
    {
        return $this->hasMany(Models\LinkedSocialAccount::class);
    }
}
