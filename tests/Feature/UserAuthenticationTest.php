<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\User;

class UserAuthenticationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    /**
     * Test user registration
     * 
     * @return void
     */
    public function test_that_a_user_can_register()
    {
        $this->withExceptionHandling();
        $payload = [
            'name' => 'Dickens Odera',
            'email' => 'dickensodera9@gmail.com',
            'phone' => '0714905613',
            'password' => 'pass123',
            'password_confirmation' => 'pass123',
        ];

        $this->json('POST','/api/v1/user/register', $payload,['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'email',
                    'phone',
                    'created_at',
                    'updated_at',
                ],
                'access_token',
                'message'
            ]);
    }
}
