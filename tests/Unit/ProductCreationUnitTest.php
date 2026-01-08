<?php

namespace Tests\Unit;

use Tests\TestCase; 
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductCreationUnitTest extends TestCase
{
    use RefreshDatabase; 

    public function test_product_can_be_created()
    {
        $product = Product::create([
            'name' => 'Test Product',
            'price' => 150,
            'stock' => 10,
            'category' => 'Test',
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'price' => 150,
            'stock' => 10,
            'category' => 'Test',
        ]);
    }
}
