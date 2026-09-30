<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('animate-donor-marquee', false);
        $response->assertSee('Tata Trusts', false);
    }

    public function test_our_work_page_returns_successful_response(): void
    {
        $response = $this->get('/our-work');

        $response->assertStatus(200);
    }
}
