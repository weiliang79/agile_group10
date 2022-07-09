<?php

namespace Tests\Unit;

use App\Models\Parcel;
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
        $user = User::courier()->first();
        $response = $this->actingAs($user)->get(route('courier.home'));
        $response->assertStatus(200);
    }

    /**
     * weiliang
     */
    public function test_update_parcel()
    {
        $user = User::courier()->first();
        $this->actingAs($user)->get(route('courier.home'));
        $response = $this->actingAs($user)->post(route('courier.update_parcel'), $this->updateParcelPayload());
        $response->assertStatus(302);
        $response->assertRedirect(route('courier.home'));
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
        $response = $this->actingAs($users)->get(route('courier.parcel_request_list'));
        $response->assertStatus(200);
        $response->assertViewIs('courier.parcel_request');
    }

    private function updateParcelPayload(){
        return [
            "tracking_number" => Parcel::where('status', Parcel::STATUS_NOT_PICK_UP)->first(),
        ];
    }
}
