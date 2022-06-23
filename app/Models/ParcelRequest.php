<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParcelRequest extends Model
{
    use HasFactory;

    const STATUS_PENDING = 1, STATUS_ACCEPT = 2, STATUS_DECLINE = 3;

    protected $fillable = [
        'parcel_id',
        'courier_id',
        'status',
        'reason,'
    ];

    public function parcel(){
        return $this->belongsTo(Parcel::class, 'parcel_id');
    }

    public function courier(){
        return $this->belongsTo(User::class, 'courier_id');
    }
}
