<?php

namespace Tests\Feature;

use App\Models\Parcel;
use App\Models\ParcelRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Factory as Faker;

class ManagerNotPickUpTest extends TestCase
{
      use RefreshDatabase;

      public function setUp(): void
      {
            parent::setUp();

            // seed database
            $this->seed();
      }

      public function test_tracking_not_pickup_page_can_show()
      {
            $user = User::manager()->first();
            $response = $this->actingAs($user)->get(route("manager.tracking_not_pickup"));

            $response->assertStatus(200);
      }

      public function test_can_display_parcel_that_is_not_pickup_more_than_2_days()
      {
            $user = User::manager()->first();
            $parcel = Parcel::create($this->newParcelFlagged());

            $this->assertDatabaseHas('parcels', [
                  'id' => $parcel->id,
            ]);

            $response = $this->actingAs($user)->get(route("manager.tracking_not_pickup"));
            $response->assertStatus(200);
            //dd($response);
            $response->assertSee('<td>'.$parcel->tracking_number.'</td>', false);

      }

      public function test_manager_can_assign_parcel_to_courier()
      {
            $manager = User::manager()->first();
            $courier = User::courier()->first();
            $parcel = Parcel::create($this->newParcelFlagged());
            //$parcel = Parcel::get();

            //test if manager view is working 
            $response = $this->actingAs($manager)->get(route('manager.tracking_not_pickup_single', ['parcel_id' => $parcel->id]));
            $response->assertStatus(200);
            $response->assertSee('<td>'.$parcel->tracking_number.'</td>', false);

            //test to assign courier with manager role
            $response = $this->actingAs($manager)->post(route('manager.tracking_not_pickup_single.process'), ['parcel_id' => $parcel->id, 'courier_id' => $courier->id]);
            $response->assertStatus(302);
            $response->assertRedirect(route('manager.tracking_not_pickup'));

            //test database has the record
            $this->assertDatabaseHas('parcel_requests', [
                  'parcel_id' => $parcel->id,
                  'status' => ParcelRequest::STATUS_PENDING,
            ]);

            $this->assertDatabaseHas('parcels', [
                  'id' => $parcel->id,
                  'status' => Parcel::STATUS_NOT_PICK_UP,
            ]);

            //test assgined parcel are changed with manager role
            $response = $this->actingAs($manager)->get(route('manager.tracking_not_pickup'));
            $response->assertStatus(200);
            $response->assertSeeInOrder([$parcel->tracking_number, 'Pending'], false);

            //test assigned parcel are changed with courier role
            $response = $this->actingAs($courier)->get(route('courier.parcel_request_list'));
            $response->assertStatus(200);
            $response->assertSee('<td>'.$parcel->tracking_number.'</td>', false);
      }

      private function newParcelFlagged()
      {
            $this->faker = Faker::create();
            $courier = User::courier()->first();
            return [
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
                  'courier_id' => $courier->id,
                  'status' => \App\Models\Parcel::STATUS_NOT_PICK_UP,
                  'created_at' => Carbon::parse('-49hours'),
                  'updated_at' => Carbon::parse('-49hours'),
            ];
      }
}
