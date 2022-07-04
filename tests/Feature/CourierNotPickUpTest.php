<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Parcel;
use App\Models\ParcelRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;
use Faker\Factory as Faker;

class CourierNotPickUpTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        //seed database
        $this->seed();
    }

    public function test_parcel_request_page_can_show()
    {
        $user = User::courier()->first();
        $response = $this->actingAs($user)->get(route('courier.parcel_request_list'));

        $response->assertStatus(200);
    }

    public function test_accept_parcel_request()
    {
        $user = User::courier()->first();
        $parcel = $this->createNewParcelAndRequest($user);

        $response = $this->actingAs($user)->get(route('courier.parcel_request_respond', [
            'request_id' => $parcel->request()->where('status', ParcelRequest::STATUS_PENDING)->first()->id, 
            'action' => 'accept',
        ]));

        $response->assertStatus(302);
        $response->assertRedirect(route('courier.parcel_request_list'));
    }

    public function test_decline_parcel_request()
    {
        $user = User::courier()->first();
        $parcel = $this->createNewParcelAndRequest($user);

        //test view
        $response = $this->actingAs($user)->get(route('courier.parcel_request_form', [
            'request_id' => $parcel->request()->where('status', ParcelRequest::STATUS_PENDING)->first()->id,
        ]));

        $response->assertStatus(200);
        $response->assertSee("Parcel Request Reject");

        //test reject the parcel
        $response = $this->actingAs($user)->get(route('courier.parcel_request_respond', [
            'request_id' => $parcel->request()->where('status', ParcelRequest::STATUS_PENDING)->first()->id, 
            'action' => 'reject',
            'reason' => 'test reject',
        ]));

        $response->assertStatus(302);
        $response->assertRedirect(route('courier.parcel_request_list'));
    }

    private function createNewParcelAndRequest($user)
    {
        $this->faker = Faker::create();
        $parcel = Parcel::create([
            'tracking_number' => "P00000112",
            'weight' => $this->faker->numerify(),
            'sender_id' => 4,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->postcode(),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->postcode(),
            'recipient_phone' => $this->faker->phoneNumber(),
            'courier_id' => $user->id,
            'status' => \App\Models\Parcel::STATUS_NOT_PICK_UP,
            'created_at' => Carbon::parse('-49hours'),
            'updated_at' => Carbon::parse('-49hours'),
        ]);

        $parcel->request()->create([
            'courier_id' => $user->id,
            'status' => ParcelRequest::STATUS_PENDING,
        ]);

        $parcel->save();
        return $parcel;
    }
}
