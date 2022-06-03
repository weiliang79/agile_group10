<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    public function trackingInTransit() {
        // returns courier information and in-transit parcel count
        // , except courier with no in-transit parcel
        $data = DB::table('users')
        ->select('users.id', 'users.first_name', 'users.last_name')
        ->selectRaw('count(*) AS total')
        ->where('role_id', Role::ROLE_COURIER)
        ->where('parcels.status', Parcel::STATUS_IN_TRANSIT)
        ->join('parcels', 'users.id', 'parcels.courier_id')
        ->groupBy('users.id', 'users.first_name', 'users.last_name')
        ->get();
        
        return view('manager.tracking_in_transit', ['data' => $data]);
    }
}
