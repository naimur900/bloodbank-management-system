<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_show_registration_form()
    {
        $response = $this->get('/register/consumer');
        $response->assertStatus(200);
        $response->assertViewIs('auth.register');
    }

    public function test_register_consumer()
    {
        $userData = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'type' => User::TYPE_CONSUMER,
            'blood_group' => 'A+',
            'address' => $this->faker->address,
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $response = $this->post('/register', $userData);
        $response->assertRedirect(route('consumer.hospitals'));

        $user = User::where('email', $userData['email'])->first();
        $this->assertNotNull($user);
        $this->assertEquals($user->name, $userData['name']);
        $this->assertTrue(Hash::check($userData['password'], $user->password));
    }

    public function test_register_hospital()
    {
        $userData = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'type' => User::TYPE_HOSPITAL,
            'address' => $this->faker->address,
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $response = $this->post('/register', $userData);
        $response->assertRedirect(route('hospital.dashboard'));

        $user = User::where('email', $userData['email'])->first();
        $this->assertNotNull($user);
        $this->assertEquals($user->name, $userData['name']);
        $this->assertTrue(Hash::check($userData['password'], $user->password));
    }

    public function test_register_validation_error()
    {
        $userData = [
            'name' => '',
            'email' => 'invalid-email',
            'type' => 999, // Invalid type
            'password' => 'short',
            'password_confirmation' => 'short',
        ];

        $response = $this->post('/register', $userData);
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name', 'email', 'type', 'password']);
    }
}