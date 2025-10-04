<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class CartTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_add_to_cart_and_see_it_in_cart_page(): void
    {
        $p = Product::factory()->create(['price_cents'=>1000]);
        $this->post(route('carrito.add',$p->id), ['qty'=>2])->assertRedirect();
        $this->get(route('carrito.index'))
        ->assertStatus(200)
        ->assertSee($p->name)
        ->assertSee('S/ 20.00');
    }
}
