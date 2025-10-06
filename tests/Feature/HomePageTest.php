<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class HomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_homepage_loads_and_shows_novedades(): void
    {
        $p = Product::factory()->create();
        $this->get('/')
        ->assertStatus(200)
        ->assertSee('Novedades')
        ->assertSee($p->name);
    }
}
