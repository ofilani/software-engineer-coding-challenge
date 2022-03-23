<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_request()
    {
        $response = $this->withoutExceptionHandling()->get('/api/v1/products');

        $response->assertStatus(200);
    }


    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_making_an_api_request()
    {
        Storage::fake('products');

        $file = UploadedFile::fake()->image('product.jpg');

        $response = $this->postJson('/api/v1/products', ['name' => 'Sally', 'description' => 'Sally Description', 'price' => 29.99, 'image' => $file]);

        $response
            ->assertStatus(201)
            ->assertExactJson([
                'created' => true,
            ]);
    }
}
