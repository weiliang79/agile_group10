<?php

namespace Tests\Feature;

use Faker\Factory as Faker;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NormalUserSendParcelTest extends TestCase
{

    use RefreshDatabase;

    const COURIER_USER_ID = 2;

    public function setUp(): void
    {
        parent::setUp();

        // seed the database
        $this->seed();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_homepage_can_show()
    {
        $user = User::normalUser()->first();
        $response = $this->actingAs($user)->get(route('normal_user.home'));
        $response->assertStatus(200);
        $response->assertSee("New Parcel Info");
    }

    public function test_add_parcel()
    {
        $user = User::normalUser()->first();
        $parcel = $this->newParcelFlagged($user);
        $response = $this->actingAs($user)->get(route('normal_user.home'));
        
        $response = $this->actingAs($user)->post(route('normal_user.save_parcel'), $parcel);
        $response->assertStatus(302);
        $response->assertRedirect(route('normal_user.home'));
        
        $response = $this->actingAs($user)->get(route('normal_user.home'));
        $response->assertSee($parcel['recipient_address'], false);

    }

    private function newParcelFlagged($normalUser)
    {
        $this->faker = Faker::create();
        $courier = User::Courier()->first();
        return [
            'weight' => $this->faker->numerify(),
            'sender_id' => $normalUser->id,
            'sender_address' => $this->faker->address(),
            'sender_postcode' => $this->faker->postcode(),
            'recipient_firstname' => $this->faker->firstName(),
            'recipient_lastname' => $this->faker->lastName(),
            'recipient_address' => $this->faker->address(),
            'recipient_postcode' => $this->faker->postcode(),
            'recipient_phone' => $this->faker->phoneNumber(),
            'courier_id' => $courier->id,
        ];
    }
}
