<?php

namespace Database\Seeders;

use App\Models\Parcel;
use App\Models\ParcelDetails;
use App\Models\ParcelRequest;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ParcelSeeder extends Seeder
{
    const COURIER1_ID = 2, COURIER2_ID = 3, COURIER3_ID = 4;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        //init
        $this->faker = Faker::create();

        // 01
        Parcel::factory()->create([
            'tracking_number' => 'P00000001'
        ]);
        $this->parcel_detail_not_pickup(1);

        // 02
        Parcel::factory()->create([
            'tracking_number' => 'P00000002'
        ]);
        $this->parcel_detail_not_pickup(2);

        // 03
        Parcel::factory()->create([
            'tracking_number' => 'P00000003'
        ]);
        $this->parcel_detail_not_pickup(3);

        // 04
        Parcel::factory()->create([
            'tracking_number' => "P00000004",
            'courier_id' => self::COURIER1_ID,
            'status' => Parcel::STATUS_NOT_DISPATCHED,
        ]);
        $this->parcel_detail_not_pickup(4);
        $this->parcel_detail_not_dispatched(4);

        // 05
        Parcel::factory()->create([
            'tracking_number' => "P00000005",
            'courier_id' => self::COURIER2_ID,
            'status' => Parcel::STATUS_NOT_DISPATCHED,
        ]);
        $this->parcel_detail_not_pickup(5);
        $this->parcel_detail_not_dispatched(5);

        // 06
        Parcel::factory()->create([
            'tracking_number' => "P00000006",
            'courier_id' => self::COURIER3_ID,
            'status' => Parcel::STATUS_NOT_DISPATCHED,
        ]);
        $this->parcel_detail_not_pickup(6);
        $this->parcel_detail_not_dispatched(6);

        // 07
        Parcel::factory()->create([
            'tracking_number' => "P00000007",
            'courier_id' => self::COURIER1_ID,
            'status' => Parcel::STATUS_IN_TRANSIT,
        ]);
        $this->parcel_detail_not_pickup(7);
        $this->parcel_detail_not_dispatched(7);
        $this->parcel_detail_in_transit(7);

        // 08
        Parcel::factory()->create([
            'tracking_number' => "P00000008",
            'courier_id' => self::COURIER2_ID,
            'status' => Parcel::STATUS_IN_TRANSIT,
        ]);
        $this->parcel_detail_not_pickup(8);
        $this->parcel_detail_not_dispatched(8);
        $this->parcel_detail_in_transit(8);

        // 09
        Parcel::factory()->create([
            'tracking_number' => "P00000009",
            'courier_id' => self::COURIER3_ID,
            'status' => Parcel::STATUS_IN_TRANSIT,
        ]);
        $this->parcel_detail_not_pickup(9);
        $this->parcel_detail_not_dispatched(9);
        $this->parcel_detail_in_transit(9);

        // 10
        Parcel::factory()->create([
            'tracking_number' => "P00000010",
            'courier_id' => self::COURIER1_ID,
            'status' => Parcel::STATUS_IN_DELIVER,
        ]);
        $this->parcel_detail_not_pickup(10);
        $this->parcel_detail_not_dispatched(10);
        $this->parcel_detail_in_transit(10);
        $this->parcel_detail_in_deliver(10);

        // 11
        Parcel::factory()->create([
            'tracking_number' => "P00000011",
            'courier_id' => self::COURIER2_ID,
            'status' => Parcel::STATUS_IN_DELIVER,
        ]);
        $this->parcel_detail_not_pickup(11);
        $this->parcel_detail_not_dispatched(11);
        $this->parcel_detail_in_transit(11);
        $this->parcel_detail_in_deliver(11);

        // 12
        Parcel::factory()->create([
            'tracking_number' => "P00000012",
            'courier_id' => self::COURIER3_ID,
            'status' => Parcel::STATUS_IN_DELIVER,
        ]);
        $this->parcel_detail_not_pickup(12);
        $this->parcel_detail_not_dispatched(12);
        $this->parcel_detail_in_transit(12);
        $this->parcel_detail_in_deliver(12);

        //13
        Parcel::factory()->create([
            'tracking_number' => "P00000013",
            'courier_id' => self::COURIER1_ID,
            'status' => Parcel::STATUS_DELIVERED,
        ]);
        $this->parcel_detail_not_pickup(13);
        $this->parcel_detail_not_dispatched(13);
        $this->parcel_detail_in_transit(13);
        $this->parcel_detail_in_deliver(13);
        $this->parcel_detail_delivered(13);

        //14
        Parcel::factory()->create([
            'tracking_number' => "P00000014",
            'courier_id' => self::COURIER2_ID,
            'status' => Parcel::STATUS_DELIVERED,
        ]);
        $this->parcel_detail_not_pickup(14);
        $this->parcel_detail_not_dispatched(14);
        $this->parcel_detail_in_transit(14);
        $this->parcel_detail_in_deliver(14);
        $this->parcel_detail_delivered(14);

        //15
        Parcel::factory()->create([
            'tracking_number' => "P00000015",
            'courier_id' => self::COURIER3_ID,
            'status' => Parcel::STATUS_DELIVERED,
        ]);
        $this->parcel_detail_not_pickup(15);
        $this->parcel_detail_not_dispatched(15);
        $this->parcel_detail_in_transit(15);
        $this->parcel_detail_in_deliver(15);
        $this->parcel_detail_delivered(15);

        // 16 onwards are for parcel request
        
        //16 not pick up > 48 hours
        Parcel::factory()->create([
            'tracking_number' => "P00000016",
            'courier_id' => self::COURIER3_ID,
            'status' => Parcel::STATUS_NOT_PICK_UP,
            'created_at' => Carbon::parse('-48hours')
        ]);
        $this->parcel_detail_not_pickup(16);

        //17 not pick up > 48 hours
        Parcel::factory()->create([
            'tracking_number' => "P00000017",
            'courier_id' => self::COURIER3_ID,
            'status' => Parcel::STATUS_NOT_PICK_UP,
            'created_at' => Carbon::parse('-48hours')
        ]);
        $this->parcel_detail_not_pickup(17);

        //18 not pickup with parcel request
        $parcel = Parcel::factory()->create([
            'tracking_number' => "P00000018",
            'courier_id' => self::COURIER3_ID,
            'status' => Parcel::STATUS_NOT_PICK_UP,
            'created_at' => Carbon::parse('-48hours')
        ]);
        $this->parcel_detail_not_pickup(18);
        $parcel->request()->create([
            'courier_id' => $parcel->courier_id,
            'status' => ParcelRequest::STATUS_PENDING,
        ]);

        //19 not pickup with parcel request
        $parcel = Parcel::factory()->create([
            'tracking_number' => "P00000019",
            'courier_id' => self::COURIER3_ID,
            'status' => Parcel::STATUS_NOT_PICK_UP,
            'created_at' => Carbon::parse('-48hours')
        ]);
        $this->parcel_detail_not_pickup(19);
        $parcel->request()->create([
            'courier_id' => $parcel->courier_id,
            'status' => ParcelRequest::STATUS_PENDING,
        ]);

    }

    private function parcel_detail_not_pickup($parcel_id)
    {
        ParcelDetails::create([
            'parcel_id' => $parcel_id,
            'status' => Parcel::STATUS_NOT_PICK_UP,
            'location' => '',
            'message' => 'Parcel details are created.',
        ]);
    }

    private function parcel_detail_not_dispatched($parcel_id)
    {
        ParcelDetails::create([
            'parcel_id' => $parcel_id,
            'status' => Parcel::STATUS_NOT_DISPATCHED,
            'location' => '',
            'message' => 'Courier has been assigned to handle the parcel.',
        ]);
    }

    private function parcel_detail_in_transit($parcel_id)
    {
        ParcelDetails::create([
            'parcel_id' => $parcel_id,
            'status' => Parcel::STATUS_IN_TRANSIT,
            'location' => '',
            'message' => 'Parcel is in transit.',
        ]);
    }

    private function parcel_detail_in_deliver($parcel_id)
    {
        ParcelDetails::create([
            'parcel_id' => $parcel_id,
            'status' => Parcel::STATUS_IN_DELIVER,
            'location' => '',
            'message' => 'Parcel is in delivering.',
        ]);
    }

    private function parcel_detail_delivered($parcel_id)
    {
        $parcel = Parcel::find($parcel_id);
        $parcel->receiver_name = $this->faker->name();
        $parcel->save();
        ParcelDetails::create([
            'parcel_id' => $parcel_id,
            'status' => Parcel::STATUS_DELIVERED,
            'location' => '5.3389487, 100.2712407',
            'message' => 'Parcel delivered.',
        ]);
    }
}
