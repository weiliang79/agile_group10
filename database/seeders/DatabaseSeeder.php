<?php

namespace Database\Seeders;

use App\Models\Parcel;
use App\Models\ParcelDetails;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\LaravelIgnition\Support\Composer\FakeComposer;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->faker = Faker::create();
        Parcel::create([
            'tracking_number' => "P00000001",
            'weight' => $this->faker->numerify(),
            'sender_id' => Role::ROLE_NORMAL_USER,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->numerify('1####'),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->numerify('1####'),
            'recipient_phone' => $this->faker->phoneNumber(),
            'status' => Parcel::STATUS_NOT_DISPATCHED,
        ]);
        ParcelDetails::create([
            'parcel_id' => '1',
            'status' => Parcel::STATUS_NOT_DISPATCHED,
            'location' => '',
            'message' => 'Parcel details are created.',
        ]);
        Parcel::create([
            'tracking_number' => "P00000002",
            'weight' => $this->faker->numerify(),
            'sender_id' => Role::ROLE_NORMAL_USER,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->numerify('1####'),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->numerify('1####'),
            'recipient_phone' => $this->faker->phoneNumber(),
            'status' => Parcel::STATUS_NOT_DISPATCHED,
        ]);
        ParcelDetails::create([
            'parcel_id' => '2',
            'status' => Parcel::STATUS_NOT_DISPATCHED,
            'location' => '',
            'message' => 'Parcel details are created.',
        ]);
        Parcel::create([
            'tracking_number' => "P00000003",
            'weight' => $this->faker->numerify(),
            'sender_id' => Role::ROLE_NORMAL_USER,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->numerify('1####'),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->numerify('1####'),
            'recipient_phone' => $this->faker->phoneNumber(),
            'status' => Parcel::STATUS_NOT_DISPATCHED,
        ]);
        ParcelDetails::create([
            'parcel_id' => '3',
            'status' => Parcel::STATUS_NOT_DISPATCHED,
            'location' => '',
            'message' => 'Parcel details are created.',
        ]);
        Parcel::create([
            'tracking_number' => "P00000004",
            'weight' => $this->faker->numerify(),
            'sender_id' => Role::ROLE_NORMAL_USER,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->numerify('1####'),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->numerify('1####'),
            'recipient_phone' => $this->faker->phoneNumber(),
            'courier_id' => Role::ROLE_COURIER,
            'status' => Parcel::STATUS_IN_TRANSIT,
        ]);
        ParcelDetails::create([
            'parcel_id' => '4',
            'status' => Parcel::STATUS_NOT_DISPATCHED,
            'location' => '',
            'message' => 'Parcel details are created.',
        ]);
        ParcelDetails::create([
            'parcel_id' => '4',
            'status' => Parcel::STATUS_IN_TRANSIT,
            'location' => '',
            'message' => 'Parcel are in transit.',
        ]);
        Parcel::create([
            'tracking_number' => "P00000005",
            'weight' => $this->faker->numerify(),
            'sender_id' => Role::ROLE_NORMAL_USER,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->numerify('1####'),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->numerify('1####'),
            'recipient_phone' => $this->faker->phoneNumber(),
            'courier_id' => Role::ROLE_COURIER,
            'status' => Parcel::STATUS_IN_TRANSIT,
        ]);
        ParcelDetails::create([
            'parcel_id' => '5',
            'status' => Parcel::STATUS_NOT_DISPATCHED,
            'location' => '',
            'message' => 'Parcel details are created.',
        ]);
        ParcelDetails::create([
            'parcel_id' => '5',
            'status' => Parcel::STATUS_IN_TRANSIT,
            'location' => '',
            'message' => 'Parcel are in transit.',
        ]);
        Parcel::create([
            'tracking_number' => "P00000006",
            'weight' => $this->faker->numerify(),
            'sender_id' => Role::ROLE_NORMAL_USER,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->numerify('1####'),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->numerify('1####'),
            'recipient_phone' => $this->faker->phoneNumber(),
            'courier_id' => Role::ROLE_COURIER,
            'status' => Parcel::STATUS_IN_TRANSIT,
        ]);
        ParcelDetails::create([
            'parcel_id' => '6',
            'status' => Parcel::STATUS_NOT_DISPATCHED,
            'location' => '',
            'message' => 'Parcel details are created.',
        ]);
        ParcelDetails::create([
            'parcel_id' => '6',
            'status' => Parcel::STATUS_IN_TRANSIT,
            'location' => '',
            'message' => 'Parcel are in transit.',
        ]);
        Parcel::create([
            'tracking_number' => "P00000007",
            'weight' => $this->faker->numerify(),
            'sender_id' => Role::ROLE_NORMAL_USER,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->numerify('1####'),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->numerify('1####'),
            'recipient_phone' => $this->faker->phoneNumber(),
            'courier_id' => Role::ROLE_COURIER,
            'status' => Parcel::STATUS_DELIVERED,
        ]);
        ParcelDetails::create([
            'parcel_id' => '7',
            'status' => Parcel::STATUS_NOT_DISPATCHED,
            'location' => '',
            'message' => 'Parcel details are created.',
        ]);
        ParcelDetails::create([
            'parcel_id' => '7',
            'status' => Parcel::STATUS_IN_TRANSIT,
            'location' => '',
            'message' => 'Parcel are in transit.',
        ]);
        ParcelDetails::create([
            'parcel_id' => '7',
            'status' => Parcel::STATUS_DELIVERED,
            'location' => '5.3389487, 100.2712407',
            'message' => 'Parcel Delivered.',
        ]);
        Parcel::create([
            'tracking_number' => "P00000008",
            'weight' => $this->faker->numerify(),
            'sender_id' => Role::ROLE_NORMAL_USER,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->numerify('1####'),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->numerify('1####'),
            'recipient_phone' => $this->faker->phoneNumber(),
            'courier_id' => Role::ROLE_COURIER,
            'status' => Parcel::STATUS_DELIVERED,
        ]);
        ParcelDetails::create([
            'parcel_id' => '8',
            'status' => Parcel::STATUS_NOT_DISPATCHED,
            'location' => '',
            'message' => 'Parcel details are created.',
        ]);
        ParcelDetails::create([
            'parcel_id' => '8',
            'status' => Parcel::STATUS_IN_TRANSIT,
            'location' => '',
            'message' => 'Parcel are in transit.',
        ]);
        ParcelDetails::create([
            'parcel_id' => '8',
            'status' => Parcel::STATUS_DELIVERED,
            'location' => '5.3389487, 100.2712407',
            'message' => 'Parcel Delivered.',
        ]);
        Parcel::create([
            'tracking_number' => "P00000009",
            'weight' => $this->faker->numerify(),
            'sender_id' => Role::ROLE_NORMAL_USER,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->numerify('1####'),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->numerify('1####'),
            'recipient_phone' => $this->faker->phoneNumber(),
            'courier_id' => Role::ROLE_COURIER,
            'status' => Parcel::STATUS_DELIVERED,
        ]);
        ParcelDetails::create([
            'parcel_id' => '9',
            'status' => Parcel::STATUS_NOT_DISPATCHED,
            'location' => '',
            'message' => 'Parcel details are created.',
        ]);
        ParcelDetails::create([
            'parcel_id' => '9',
            'status' => Parcel::STATUS_IN_TRANSIT,
            'location' => '',
            'message' => 'Parcel are in transit.',
        ]);
        ParcelDetails::create([
            'parcel_id' => '9',
            'status' => Parcel::STATUS_DELIVERED,
            'location' => '5.3389487, 100.2712407',
            'message' => 'Parcel Delivered.',
        ]);
    }
}
