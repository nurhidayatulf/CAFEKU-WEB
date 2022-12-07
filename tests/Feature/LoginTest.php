<?php

namespace Tests\Feature;

use App\Models\Kategori;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_login()
    {
        $response = $this->post('/login', [
            'email' => 'admin@gmail.com',
            'password' => '0099887766'
        ]);

        $response->assertRedirect('/home');
    }
}