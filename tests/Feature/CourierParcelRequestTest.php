<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourierParcelRequestTest extends TestCase
{
    public function test_can_list_a_new_parcel_request_when_manager_assign_one()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_accept_a_parcel_request()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_reject_a_parcel_request()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
