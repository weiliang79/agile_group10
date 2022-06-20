<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        // seed the database
        $this->seed();
    }

    public function test_register()
    {
        $users = User::manager()->first();
        // dd($users);
        $response = $this->actingAs($users)->get(route('register'));
        $response->assertStatus(302);
        $response->assertRedirect('home');
    }

    private function registerProcess()
    {
        return [
            "firstname" => $this->faker->firstName(),
            "lastname" => $this->faker->lastName(),
            "username" => $this->faker->userName(),
            "recipient_phone" => $this->faker->phoneNumber(),
            "gender" => 2,
        ]; 
    }
}
