<?php

namespace Tests\Unit;

use App\Models\Parcel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LandingControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        // seed the database
        $this->seed();
    }

    /**
     * weiliang
     */
    public function test_index()
    {
        $response = $this->get(route('landing'));
        $response->assertStatus(200);
    }

    /**
     * weiliang
     */
    public function test_tracking()
    {
        $tracking_number = Parcel::first()->tracking_number;
        $response = $this->get(route('landing.tracking', ['tracking_number' => $tracking_number]));
        $response->assertStatus(200);
    }
}
