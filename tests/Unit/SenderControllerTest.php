<?php

namespace Tests\Unit;

use App\Http\Controllers\SenderController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Tests\TestCase;

class SenderControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        // seed the database
        $this->seed();
    }

    /**
     * kaiming
     */
    public function test_index()
    {
        $users = User::normaluser()->first();
        $response = $this->actingAs($users)->post(route('normal_user.home'));
        $response->assertStatus(405);
    }

    /**
     * kaiming
     */
    public function test_send_parcel()
    {
        $users = User::normaluser()->first();
        $response = $this->actingAs($users)->post(route('normal_user.save_parcel'), $this->payload());
        $response->assertRedirect(route('normal_user.home'));
    }

    /**
     * kaiming
     */
    public function test_genarate_tracking_number()
    {
        $controller = new SenderController;
        $this->assertEquals('P00000001', $controller->generateTrackingNumber(1));

    }

    private function payload()
    {
        return [
            'sender_address' => $this->faker->address(),
            "sender_postcode" => $this->faker->postcode(),
            "recipient_firstname" => $this->faker->firstName(),
            "recipient_lastname" => $this->faker->lastName(),
            "recipient_address" => $this->faker->address(),
            "recipient_postcode" => $this->faker->postcode(),
            "recipient_phone" => $this->faker->phoneNumber(),
            "weight" => $this->faker->randomNumber(2),
            "courier_id" => User::courier()->first()->id
        ];
    }


}
