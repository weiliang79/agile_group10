<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    public function trackingInTransit() {
        // returns courier information and in-transit parcel count
        // , except courier with no in-transit parcel
        $table = DB::table('users')
        ->select('users.id', 'users.first_name', 'users.last_name')
        ->selectRaw('count(*) AS total')
        ->where('role_id', Role::ROLE_COURIER)
        ->where('parcels.status', Parcel::STATUS_IN_TRANSIT)
        ->join('parcels', 'users.id', 'parcels.courier_id')
        ->groupBy('users.id', 'users.first_name', 'users.last_name')
        ->get();

        return view('manager.tracking_in_transit', ['table' => $table]);
    }

    public function trackingInTransitSingle($courier_id) {
        $parcels = Parcel::where('courier_id', $courier_id)
            ->where('status', Parcel::STATUS_IN_TRANSIT)
            ->get();
        $courier = $parcels->first()->courier;
        return view('manager.tracking_in_transit_single', ['parcels' => $parcels, 'courier' => $courier]);
    }

    public function trackingNotDispatched() {
        $parcels = Parcel::where('status', Parcel::STATUS_NOT_DISPATCHED)
            ->orderBy('created_at', 'DESC')
            ->get();
        $flagged = Parcel::where('status', Parcel::STATUS_NOT_DISPATCHED)
            ->where('created_at', '<', Carbon::parse('-48hours'))
            ->orderBy('created_at', 'ASC')
            ->get();
        return view('manager.tracking_not_dispatched', ['parcels' => $parcels, 'flagged' => $flagged]);
    }
    
    public function parcelDelivered() {
        $parcels = Parcel::where('status', Parcel::STATUS_DELIVERED)
        ->orderBy('created_at', 'DESC')
        ->get();

        return view('manager.parcel_delivered', compact('parcels'));
    }

}
