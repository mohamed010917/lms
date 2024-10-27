<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User ;

class homeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_home_badge(): void
    {
        $response = $this->get('/');
        $response->assertSee("alsyed ali ebrahim");
        $response->assertStatus(200);
    }
    public function test_viset_not_empty_home_page()
    {
        $response = $this->get('/');
        $response->assertSee("name");
        $response->assertStatus(200);
    }
}
