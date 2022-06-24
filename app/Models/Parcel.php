<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parcel extends Model
{
    use HasFactory, SoftDeletes;
    const STATUS_NOT_PICK_UP = 1, STATUS_NOT_DISPATCHED = 2, STATUS_IN_TRANSIT = 3, STATUS_IN_DELIVER = 4, STATUS_DELIVERED = 5;

    protected $fillable = [
        'id',
        'tracking_number',
        'weight',
        'sender_id',
        'sender_address',
        'sender_postcode',
        'recipient_firstname',
        'recipient_lastname',
        'recipient_address',
        'recipient_postcode',
        'recipient_phone',
        'courier_id',
        'status',
        'receiver_name',
        'signature',
        'created_time',
        'arrived_time',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'tracking_number';
    }

    public function details()
    {
        return $this->hasMany(ParcelDetails::class);
    }

    public function request(){
        return $this->hasMany(ParcelRequest::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function courier()
    {
        return $this->belongsTo(User::class, 'courier_id');
    }

    public static function getReadableStatus($parcel_id)
    {
        switch ($parcel_id) {
            case Parcel::STATUS_NOT_PICK_UP:
                return "Not Pickup";
                break;
            case Parcel::STATUS_NOT_DISPATCHED:
                return "Not Dispatched";
                break;
            case Parcel::STATUS_IN_TRANSIT:
                return "In Transit";
                break;
            case Parcel::STATUS_IN_DELIVER:
                return "In Deliver";
                break;
            case Parcel::STATUS_DELIVERED:
                return "Delivered";
                break;
            default:
                "Status Invalid!";
                break;
        }
    }
}
