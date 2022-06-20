<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParcelDetails extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'time',
        'location',
        'status',
        'message',
        'parcel_id',
    ];

    public function parcel(){
        return $this->belongsTo(Parcel::class);
    }
}


