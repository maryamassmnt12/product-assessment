<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Admin;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class ProductCreationFeatureTest extends TestCase
{
    use RefreshDatabase;// ensures fresh DB with migrations

    public function test_admin_can_create_product()
    {
        // Create a test admin
       $admin = Admin::create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // encrypt password
        ]);

        // Simulate login with admin guard
        $response = $this->actingAs($admin, 'admin')->post('/admin/product/store', [
            'name' => 'Feature Test Product',
            'price' => 250,
            'stock' => 20,
            'category' => 'Test',
        ]);

        // Check for redirect (assuming successful creation redirects)
        $response->assertStatus(302);

        // Assert product exists in the database
        $this->assertDatabaseHas('products', [
            'name' => 'Feature Test Product',
            'price' => 250,
            'stock' => 20,
            'category' => 'Test',
        ]);
    }
}

