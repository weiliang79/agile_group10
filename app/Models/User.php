<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    const GENDER_MALE = 1, GENDER_FEMALE = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'address',
        'postcode',
        'email',
        'password',
        'gender',
        'phone',
        'role_id',
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

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function sender_parcel(){
        return $this->hasMany(Parcel::class, 'sender_id');
    }

    public function courier_parcel(){
        return $this->hasMany(Parcel::class, 'courier_id');
    }

    public function parcel_request(){
        return $this->hasMany(ParcelRequest::class, 'courier_id');
    }


    public function isManager(){

        if($this->role()->whereIn('id', [Role::ROLE_MANAGER])->count() > 0){
            return true;
        }
        return false;

        //return $this->role->id == Role::ROLE_MANAGER;
    }

    public function isCourier(){

        if($this->role()->whereIn('id', [Role::ROLE_COURIER])->count() > 0){
            return true;
        }
        return false;

        //return $this->role->id == Role::ROLE_COURIER;
    }

    public function isNormalUser(){

        if($this->role()->whereIn('id', [Role::ROLE_NORMAL_USER])->count() > 0){
            return true;
        }
        return false;

        //return $this->role->id == Role::ROLE_NORMAL_USER;
    }

    /**
     * refer to https://laravel.com/docs/9.x/eloquent#local-scopes
     * 
     */
    public function scopeManager($query) : Builder
    {
        return $query->where("role_id", Role::ROLE_MANAGER);
    }

    public function scopeCourier($query) : Builder
    {
        return $query->where('role_id', Role::ROLE_COURIER);
    }

    public function scopeNormaluser($query) : Builder
    {
        return $query->where("role_id", Role::ROLE_NORMAL_USER);
    }
}