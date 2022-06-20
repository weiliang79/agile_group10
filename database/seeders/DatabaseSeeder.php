<?php

namespace Database\Seeders;

use App\Models\Parcel;
use App\Models\ParcelDetails;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\LaravelIgnition\Support\Composer\FakeComposer;
use Faker\Generator;

class DatabaseSeeder extends Seeder
{
    const COURIER_ID = 2;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        //init
        $this->faker = app(Generator::class);

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
            'courier_id' => self::COURIER_ID,
            'status' => Parcel::STATUS_NOT_DISPATCHED,
        ]);
        $this->parcel_detail_not_pickup(4);
        $this->parcel_detail_not_dispatched(4);

        // 05
        Parcel::factory()->create([
            'tracking_number' => "P00000005",
            'courier_id' => self::COURIER_ID,
            'status' => Parcel::STATUS_NOT_DISPATCHED,
        ]);
        $this->parcel_detail_not_pickup(5);
        $this->parcel_detail_not_dispatched(5);

        // 06
        Parcel::factory()->create([
            'tracking_number' => "P00000006",
            'courier_id' => self::COURIER_ID,
            'status' => Parcel::STATUS_NOT_DISPATCHED,
        ]);
        $this->parcel_detail_not_pickup(6);
        $this->parcel_detail_not_dispatched(6);

        // 07
        Parcel::factory()->create([
            'tracking_number' => "P00000007",
            'courier_id' => self::COURIER_ID,
            'status' => Parcel::STATUS_IN_TRANSIT,
        ]);
        $this->parcel_detail_not_pickup(7);
        $this->parcel_detail_not_dispatched(7);
        $this->parcel_detail_in_transit(7);

        // 08
        Parcel::factory()->create([
            'tracking_number' => "P00000008",
            'courier_id' => self::COURIER_ID,
            'status' => Parcel::STATUS_IN_TRANSIT,
        ]);
        $this->parcel_detail_not_pickup(8);
        $this->parcel_detail_not_dispatched(8);
        $this->parcel_detail_in_transit(8);

        // 09
        Parcel::factory()->create([
            'tracking_number' => "P00000009",
            'courier_id' => self::COURIER_ID,
            'status' => Parcel::STATUS_IN_TRANSIT,
        ]);
        $this->parcel_detail_not_pickup(9);
        $this->parcel_detail_not_dispatched(9);
        $this->parcel_detail_in_transit(9);

        // 10
        Parcel::factory()->create([
            'tracking_number' => "P00000010",
            'courier_id' => self::COURIER_ID,
            'status' => Parcel::STATUS_DELIVERED,
        ]);
        $this->parcel_detail_not_pickup(10);
        $this->parcel_detail_not_dispatched(10);
        $this->parcel_detail_in_transit(10);
        $this->parcel_detail_delivered(10);

        // 11
        Parcel::factory()->create([
            'tracking_number' => "P00000011",
            'courier_id' => self::COURIER_ID,
            'status' => Parcel::STATUS_DELIVERED,
        ]);
        $this->parcel_detail_not_pickup(11);
        $this->parcel_detail_not_dispatched(11);
        $this->parcel_detail_in_transit(11);
        $this->parcel_detail_delivered(11);

        // 12
        Parcel::factory()->create([
            'tracking_number' => "P00000012",
            'courier_id' => self::COURIER_ID,
            'status' => Parcel::STATUS_DELIVERED,
        ]);
        $this->parcel_detail_not_pickup(12);
        $this->parcel_detail_not_dispatched(12);
        $this->parcel_detail_in_transit(12);
        $this->parcel_detail_delivered(12);
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

    private function parcel_detail_delivered($parcel_id)
    {
        ParcelDetails::create([
            'parcel_id' => $parcel_id,
            'status' => Parcel::STATUS_DELIVERED,
            'location' => '5.3389487, 100.2712407',
            'message' => 'Parcel delivered.',
        ]);
    }
}
