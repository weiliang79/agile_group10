<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManagerControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        // seed the database
        $this->seed();
    }

    /**
     * lingxiao
     */
    public function test_index()
    {
        $users = User::manager()->first();
        $response = $this->actingAs($users)->get(route('manager.home'));
        $response->assertStatus(302);
        $response->assertRedirect(route('manager.tracking_not_pickup'));
    }

    /**
     * lingxiao
     */
    public function test_tracking_in_transit()
    {
        $users = User::manager()->first();
        $response = $this->actingAs($users)->get(route('manager.tracking_in_transit'));
        $response->assertStatus(200);
        $response->assertViewIs('manager.tracking_in_transit');
    }

    /**
     * lingxiao
     */
    public function test_tracking_in_transit_single()
    {
        $users = User::manager()->first();
        $courier = User::courier()->first();
        $response = $this->actingAs($users)->get(route('manager.tracking_in_transit_single', $courier->id));
        $response->assertStatus(200);
        $response->assertViewIs('manager.tracking_in_transit_single');
    }

    /**
     * lingxiao
     */
    public function test_tracking_not_dispatch()
    {
        $users = User::manager()->first();
        $response = $this->actingAs($users)->get(route('manager.tracking_not_dispatched'));
        $response->assertStatus(200);
        $response->assertViewIs('manager.tracking_not_dispatched');
    }

    /**
     * jiasheng
     */
    public function test_tracking_delivered()
    {
        $users = User::manager()->first();
        $response = $this->actingAs($users)->get(route('manager.tracking_delivered'));
        $response->assertStatus(200);
        $response->assertSee('Parcel Delivered');
    }
}
