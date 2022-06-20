<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_register()
    {
        $users = User::normaluser()->first();
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
