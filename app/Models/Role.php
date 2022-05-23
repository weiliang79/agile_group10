<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;
    const ROLE_SUPER_ADMIN = 1, ROLE_MANAGER = 2, ROLE_COURIER = 3, ROLE_NORMAL_USER = 4;

    protected $fillable = [
        "role_name",
        "description",
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
