<?php

namespace Tests\Feature;

use App\Http\Controllers\ManagerController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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
        // get the first manager in database
        $user = User::manager()->first();
        $response = $this->actingAs($user)->get(route("manager.tracking_not_dispatched"));

        $response->assertStatus(200);
        $response->assertSee("<h2>Manager Tracking Page</h2>", false);
    }
}
