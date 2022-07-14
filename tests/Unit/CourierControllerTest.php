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
        $user = User::courier()->first();
        $response = $this->actingAs($user)->get(route('courier.deliver_screen', ["P00000001"]));
        $response->assertStatus(200);
    }

    /**
     * kaiming
     */
    public function test_deliver_screen_submit()
    {
        $user = User::courier()->first();
        $response = $this->actingAs($user)->post(route('courier.deliver_screen_submit'), [
            "tracking_number" => "P00000001", 
            "receiver_name" => "bruh",
            "signature" => `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 300 150" width="240" height="120"><path d="M 74.400,36.800 C 72.819,40.316 73.200,40.400 72.000,44.000" stroke-width="5.424" stroke="black" fill="none" stroke-linecap="round"></path><path d="M 72.000,44.000 C 71.200,47.591 71.219,47.516 71.200,51.200" stroke-width="4.296" stroke="black" fill="none" stroke-linecap="round"></path><path d="M 71.200,51.200 C 71.056,57.298 71.200,57.191 72.000,63.200" stroke-width="3.542" stroke="black" fill="none" stroke-linecap="round"></path><path d="M 72.000,63.200 C 72.744,67.415 72.656,67.298 74.400,71.200" stroke-width="3.700" stroke="black" fill="none" stroke-linecap="round"></path><path d="M 74.400,71.200 C 75.523,74.111 75.544,73.815 77.600,76.000" stroke-width="4.036" stroke="black" fill="none" stroke-linecap="round"></path><path d="M 77.600,76.000 C 80.257,77.939 79.923,78.111 83.200,79.200" stroke-width="4.467" stroke="black" fill="none" stroke-linecap="round"></path><path d="M 83.200,79.200 C 85.923,80.550 85.857,80.339 88.800,80.800" stroke-width="4.313" stroke="black" fill="none" stroke-linecap="round"></path><path d="M 88.800,80.800 C 95.384,81.756 95.123,81.350 101.600,80.800" stroke-width="3.406" stroke="black" fill="none" stroke-linecap="round"></path><path d="M 101.600,80.800 C 105.908,79.737 105.784,80.156 109.600,77.600" stroke-width="3.629" stroke="black" fill="none" stroke-linecap="round"></path><path d="M 109.600,77.600 C 113.360,74.981 113.508,75.337 116.800,72.000" stroke-width="3.651" stroke="black" fill="none" stroke-linecap="round"></path><path d="M 116.800,72.000 C 119.703,69.940 119.360,69.781 121.600,67.200" stroke-width="3.902" stroke="black" fill="none" stroke-linecap="round"></path></svg>`,
            "location" => "5.3389487, 100.2712407",
            
        ]);
        $response->assertStatus(302);
        $response->assertRedirect(route('courier.home'));
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
