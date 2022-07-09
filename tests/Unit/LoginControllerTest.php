<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
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
        $response = $this->get(route('login'));
        $response->assertStatus(200);
    }

    /**
     * weiliang
     */
    public function test_process()
    {
        $cert = [
            'email' => 'normaluser@isp.com',
            'password' => 'normaluser123',
        ];
        $response = $this->post(route('login.process', $cert));
        $response->assertStatus(302);
        $response->assertRedirect(route('normal_user.home'));
    }

    /**
     * jiasheng
     */
    public function test_register()
    {
        $users = User::manager()->first();
        // dd($users);
        $response = $this->actingAs($users)->get(route('register'));
        $response->assertStatus(302);
        $response->assertRedirect('home');
    }

    /**
     * jiasheng
     */
    public function test_register_process()
    {
    }

    /**
     * weiliang
     */
    public function test_destroy()
    {
        $user = User::normaluser()->first();
        $this->actingAs($user)->get(route('normal_user.home'));
        $response = $this->get(route('logout'));
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }
}
