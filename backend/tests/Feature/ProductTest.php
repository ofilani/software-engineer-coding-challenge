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
        $response = $this->withoutExceptionHandling()->get('api/v1/products');

        $response->assertStatus(200);
    }


    /**
     * A basic functional test example.
     *
     * @return void
     */


    public function test_making_an_api_request()
    {
        Storage::fake('photos');
        $response = $this->post('api/v1/products', [
            'name' => 'Product nae',
            'price' => 99.99,
            'description' => 'Description lerm ipsum',
            'image' => UploadedFile::fake()->image('test.jpg')
        ]);
        $response->assertStatus(201);
    }
}
