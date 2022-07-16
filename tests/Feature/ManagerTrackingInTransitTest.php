<?php

namespace Tests\Feature;

use App\Models\Parcel;
use App\Models\Role;
use App\Models\User;
use Database\Factories\ParcelFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Factory as Faker;

class ManagerTrackingInTransitTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // seed the database
        $this->seed();
    }

    public function test_tracking_page_can_show()
    {
        // get the first manager in database
        $user = User::manager()->first();
        $response = $this->actingAs($user)->get(route("manager.tracking_in_transit"));
        $response->assertStatus(200);
        $response->assertViewIs('manager.tracking_in_transit');
    }

    public function test_tracking_page_multiple_courier_have_parcel_in_transit()
    {
        // new courier
        $newcourier = User::create($this->newCourier());

        // new courier's parcel
        $parcel = Parcel::create($this->newParcel());
        $parcel->courier_id = $newcourier->id;
        $parcel->save();

        $this->assertDatabaseHas('users', [
            'email' => 'support@fedex.com',
        ]);

        $this->assertDatabaseHas('parcels', [
            'tracking_number' => "P00000111"
        ]);

        $user = User::manager()->first();
        $response = $this->actingAs($user)->get(route("manager.tracking_in_transit"));
        $response->assertSee('FedEx');
        $response->assertSee('support@fedex.com');
    }

    private function newCourier() {
        return [
            'username' => 'FedEx',
            'first_name' => 'FedEx',
            'last_name' => '-',
            'address' => '3G-G-3B, Ground Floor, Straits Quay, Jalan Seri Tanjung Pinang, 10470, Tanjung Tokong',
            'postcode' => '10470',
            'email' => 'support@fedex.com',
            'password' => 'mmmmmm',
            'gender' => User::GENDER_MALE,
            'phone' => '1800886363',
            'role_id' => Role::ROLE_COURIER,
        ];
    }

    private function newParcel() {
        $this->faker = Faker::create();
        return [
            'tracking_number' => "P00000111",
            'weight' => $this->faker->numerify(),
            'sender_id' => 4,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->postcode(),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->postcode(),
            'recipient_phone' => $this->faker->phoneNumber(),
            'status' => \App\Models\Parcel::STATUS_IN_TRANSIT,
        ];
    }
}
