<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Parcel;
use App\Models\ParcelRequest;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ManagerController extends BaseController
{

    public function index(){
        if(Gate::allows('isManager')){
            return redirect()->route('manager.tracking_in_transit');
        }
        abort(403);
    }

    public function trackingInTransit() {
        // returns courier information and in-transit parcel count
        // , except courier with no in-transit parcel
        $couriers = User::courier()->get();
        
        return view('manager.tracking_in_transit', ['couriers' => $couriers]);
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
            ->where('created_at', '>=', Carbon::parse('-48hours'))
            ->orderBy('created_at', 'DESC')
            ->get();
        $flagged = Parcel::where('status', Parcel::STATUS_NOT_DISPATCHED)
            ->where('created_at', '<', Carbon::parse('-48hours'))
            ->orderBy('created_at', 'ASC')
            ->get();
        return view('manager.tracking_not_dispatched', ['parcels' => $parcels, 'flagged' => $flagged]);
    }
    
    public function trackingDelivered() {
        $parcels = Parcel::where('status', Parcel::STATUS_DELIVERED)
        ->orderBy('created_at', 'DESC')
        ->get();

        return view('manager.parcel_delivered', compact('parcels'));
    }


    public function trackingNotPickUp(){
        $parcels = Parcel::where('status',  Parcel::STATUS_NOT_PICK_UP)
            ->orderBy('created_at', 'ASC')
            ->get();

        $flagged = Parcel::where   ('status',Parcel::STATUS_NOT_PICK_UP)
            ->where('created_at', '<', Carbon::parse('-48hours'))
            ->orderBy('created_at', 'ASC')
            ->get();

        return view('manager.tracking_not_pickup',['parcels' => $parcels, 'flagged' => $flagged]);
    }

    public function trackingNotPickupSingle($parcel_id){
        $parcel = Parcel::find($parcel_id);

        $couriers = User::where('role_id', Role::ROLE_COURIER)->get();

        return view('manager.tracking_not_pickup_single', compact('parcel', 'couriers'));
    }

    public function trackingNotPickupSingleProcess(Request $request){
        //dd($request);

        if($request->courier_id == 0){
            return redirect()->back()->with('error', 'Please select a valid courier.');
        }

        $parcel = Parcel::find($request->parcel_id);

        $parcelRequest = $parcel->request()->create([
            'courier_id' => $request->courier_id,
            'status' => ParcelRequest::STATUS_PENDING,
        ]);

        return redirect()->route('manager.tracking_not_pickup')->with('success', 'The selected courier has been associated to the parcel.');
    }

}
