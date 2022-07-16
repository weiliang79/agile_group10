<?php

namespace Tests\Feature;

use App\Models\Parcel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManagerTrackingSingleCourierTest extends TestCase
{
    use RefreshDatabase;

    const COURIER_USER_ID = 2;

    public function setUp(): void
    {
        parent::setUp();

        // seed the database
        $this->seed();
    }

    public function test_single_courier_page_can_show()
    {
        // get the first manager in database
        $user = User::manager()->first();
        $response = $this->actingAs($user)->get(route("manager.tracking_in_transit_single", [
            'courier_id' => $this::COURIER_USER_ID
        ]));

        $response->assertStatus(200);
    }

    public function test_page_can_display_new_parcel_in_transit()
    {
        Parcel::factory()->create([
            'status' => Parcel::STATUS_IN_TRANSIT,
            'courier_id' => User::courier()->first(),
            'recipient_firstname' => "test name"
        ]);
        $user = User::manager()->first();
        $response = $this->actingAs($user)->get(route("manager.tracking_in_transit_single", [
            'courier_id' => $this::COURIER_USER_ID
        ]));
        $response->assertSeeText('test name');
    }
}
