<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourierControllerTest extends TestCase
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
        
    }

    /**
     * weiliang
     */
    public function test_update_parcel()
    {
        
    }

    /**
     * kaiming
     */
    public function test_deliver_screen()
    {
        
    }

    /**
     * kaiming
     */
    public function test_deliver_screen_submit()
    {
        
    }

    /**
     * kaiming
     */
    public function test_tracking_page()
    {
        
    }

    /**
     * lingxiao
     */
    public function test_parcel_request_list()
    {
        $users = User::courier()->first();
        $response = $this->actingAs($users)->post(route('courier.parcel_request_list'));
        $response->assertStatus(200);
    }
}
