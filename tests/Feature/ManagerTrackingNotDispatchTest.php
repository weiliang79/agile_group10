<?php

namespace Tests\Feature;

use App\Http\Controllers\ManagerController;
use App\Models\Parcel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Factory as Faker;

class ManagerTrackingNotDispatchTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // seed the database
        $this->seed();
    }

    public function test_not_diapatched_page_can_show()
    {
        $user = User::manager()->first();
        $response = $this->actingAs($user)->get(route("manager.tracking_not_dispatched"));

        $response->assertStatus(200);
        $response->assertSee("<h2>Manager Tracking Page</h2>", false);
    }

    public function test_earliest_on_top()
    {
        $parcel = Parcel::create($this->newParcel());
        // parcel from the future, cannot be earlier than that lmao
        $parcel->created_at = '2023-01-01 08:08:12';
        $parcel->save();
        
        $user = User::manager()->first();
        $response = $this->actingAs($user)->get(route("manager.tracking_not_dispatched"));
        
        // the new created parcel should show first, and should still have other 3 parcel below it
        $response->assertSeeInOrder(['<td>'.$parcel->tracking_number, '<tr>', '<tr>', '<tr>'], false);
        $response->assertSee("<h2>Manager Tracking Page</h2>", false);
    }

    private function newParcel() {
        $this->faker = Faker::create();
        return [
            'tracking_number' => $this->faker->numerify('P00000##'),
            'weight' => $this->faker->numerify(),
            'sender_id' => 4,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->postcode(),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->postcode(),
            'recipient_phone' => $this->faker->phoneNumber(),
            'status' => \App\Models\Parcel::STATUS_NOT_DISPATCHED,
            'created_at' => '2023-01-01 08:08:12',
        ];
    }
}
