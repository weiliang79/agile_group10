<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;
    const ROLE_MANAGER = 1, ROLE_COURIER = 2, ROLE_NORMAL_USER = 3;

    protected $fillable = [
        "role_name",
        "description",
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
