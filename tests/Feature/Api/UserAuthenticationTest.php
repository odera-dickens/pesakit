<?php

namespace Tests\Feature\Api;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        $this->withoutExceptionHandling();
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
    public function test_required_fields_validation_on_register()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/api/v1/user/register');
        $response->assertStatus(400);
        $response->assertJsonFragment([
            'message' => 'The given data was invalid.',
            'errors'=>[
                'name' => ['The name field is required.'],
                'email' => ['The email field is required.'],
                'password' => ['The password field is required'],
                'password_confirmation' => ['The password_confirmation field is required.']
            ]
        ]);
    }
    public function test_that_a_user_can_login()
    {
        $this->withoutExceptionHandling();
        $user = [
            'email' => 'test@test.com',
            'password' => Hash::make('password')
        ];
        $response = $this->json('POST',route('user.api.login'),$user,['Accept' => 'application/json']);
        //dd($response->getContent()); //user does not exist
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'access_token',
            'data' => [
                'id',
                'name',
                'email',
                'email_verified_at',
                'created_at',
                'updated_at',
                'phone',
                'role',
            ],
            'message'
        ]);
        $response->assertAuthenticated();
    }
}
