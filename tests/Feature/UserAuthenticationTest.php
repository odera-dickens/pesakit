<?php

namespace Tests\Feature;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class UserAuthenticationTest extends TestCase
{
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
        $this->withoutExceptionHandling();
        $payload = [
            'name' => 'Dickens Odera',
            'email' => 'dickensodera9@gmail.com',
            'password' => 'pass123',
            'password_confirmation' => 'pass123'
        ];

        $this->json('POST','/api/v1/user/register', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }
}
