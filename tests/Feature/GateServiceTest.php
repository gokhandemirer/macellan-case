<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GateServiceTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_the_endpoint_returns_a_successful_response()
    {
        $response = $this->post('/api/open-gate', [
            'point'     => (string)$this->faker->randomFloat(),
            'order_id'  => (string)$this->faker->randomNumber(9),
            'user_id'   => $this->faker->uuid(),
            'ref_code'  => (string)$this->faker->randomNumber(9),
            'hash'      => '2918f946ce80bd37e7dbf4ade4888df9d281de0d',
        ]);

        $response->assertStatus(200);
    }

    public function test_the_endpoint_returns_an_unathorized_response()
    {
        $response = $this->post('/api/open-gate', [
            'point'     => (string)$this->faker->randomFloat(),
            'order_id'  => (string)$this->faker->randomNumber(9),
            'user_id'   => $this->faker->uuid(),
            'ref_code'  => (string)$this->faker->randomNumber(9),
            'hash'      => $this->faker->uuid,
        ]);

        $response->assertStatus(403);
    }
}
