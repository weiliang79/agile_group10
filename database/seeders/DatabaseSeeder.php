<?php

namespace Database\Seeders;

use App\Models\Parcel;
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
        // \App\Models\User::factory(10)->create();
        $this->faker = Faker::create();
        Parcel::create([
            'tracking_number' => "P00000001",
            'weight' => $this->faker->numerify(),
            'sender_id' => 4,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->numerify('1####'),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->numerify('1####'),
            'recipient_phone' => $this->faker->phoneNumber(),
            'courier_id' => 3,
            'status' => \App\Models\Parcel::STATUS_NOT_DISPATCHED,
        ]);
        Parcel::create([
            'tracking_number' => "P00000002",
            'weight' => $this->faker->numerify(),
            'sender_id' => 4,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->numerify('1####'),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->numerify('1####'),
            'recipient_phone' => $this->faker->phoneNumber(),
            'courier_id' => 3,
            'status' => \App\Models\Parcel::STATUS_NOT_DISPATCHED,
        ]);
        Parcel::create([
            'tracking_number' => "P00000003",
            'weight' => $this->faker->numerify(),
            'sender_id' => 4,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->numerify('1####'),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->numerify('1####'),
            'recipient_phone' => $this->faker->phoneNumber(),
            'courier_id' => 3,
            'status' => \App\Models\Parcel::STATUS_NOT_DISPATCHED,
        ]);
        Parcel::create([
            'tracking_number' => "P00000004",
            'weight' => $this->faker->numerify(),
            'sender_id' => 4,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->numerify('1####'),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->numerify('1####'),
            'recipient_phone' => $this->faker->phoneNumber(),
            'courier_id' => 3,
            'status' => \App\Models\Parcel::STATUS_IN_TRANSIT,
        ]);
        Parcel::create([
            'tracking_number' => "P00000005",
            'weight' => $this->faker->numerify(),
            'sender_id' => 4,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->numerify('1####'),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->numerify('1####'),
            'recipient_phone' => $this->faker->phoneNumber(),
            'courier_id' => 3,
            'status' => \App\Models\Parcel::STATUS_IN_TRANSIT,
        ]);
        Parcel::create([
            'tracking_number' => "P00000006",
            'weight' => $this->faker->numerify(),
            'sender_id' => 4,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->numerify('1####'),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->numerify('1####'),
            'recipient_phone' => $this->faker->phoneNumber(),
            'courier_id' => 3,
            'status' => \App\Models\Parcel::STATUS_IN_TRANSIT,
        ]);
        Parcel::create([
            'tracking_number' => "P00000007",
            'weight' => $this->faker->numerify(),
            'sender_id' => 4,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->numerify('1####'),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->numerify('1####'),
            'recipient_phone' => $this->faker->phoneNumber(),
            'courier_id' => 3,
            'status' => \App\Models\Parcel::STATUS_DELIVERED,
        ]);
        Parcel::create([
            'tracking_number' => "P00000008",
            'weight' => $this->faker->numerify(),
            'sender_id' => 4,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->numerify('1####'),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->numerify('1####'),
            'recipient_phone' => $this->faker->phoneNumber(),
            'courier_id' => 3,
            'status' => \App\Models\Parcel::STATUS_DELIVERED,
        ]);
        Parcel::create([
            'tracking_number' => "P00000009",
            'weight' => $this->faker->numerify(),
            'sender_id' => 4,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->numerify('1####'),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->numerify('1####'),
            'recipient_phone' => $this->faker->phoneNumber(),
            'courier_id' => 3,
            'status' => \App\Models\Parcel::STATUS_DELIVERED,
        ]);
    }
}
