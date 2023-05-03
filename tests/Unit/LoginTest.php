<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;
use App\Http\Controllers\LoginController;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $loginController;

    protected function setUp(): void
    {
        parent::setUp();
        $this->loginController = new LoginController();
    }

    /** @test */
    public function test_successful_login()
    {
        // Arrange
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'secret'),
        ]);
        $request = new Request([
            'email' => $user->email,
            'password' => $password,
        ]);

        // Act
        $response = $this->loginController->login($request);

        // Assert
        $this->assertInstanceOf(Response::class, $response);
        $this->assertTrue(Auth::check());
    }

    /** @test */
    public function test_failed_login()
    {
        // Arrange
        $user = factory(User::class)->create([
            'password' => bcrypt('secret'),
        ]);
        $request = new Request([
            'email' => $user->email,
            'password' => 'wrong_password',
        ]);

        // Act
        $response = $this->loginController->login($request);

        // Assert
        $this->assertInstanceOf(Response::class, $response);
        $this->assertFalse(Auth::check());
    }

    /** @test */
    public function test_login_throttling()
    {
        // Arrange
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'secret'),
        ]);
        $request = new Request([
            'email' => $user->email,
            'password' => 'wrong_password',
        ]);

        // Act and Assert
        for ($i = 0; $i < 5; $i++) {
            $response = $this->loginController->login($request);
            $this->assertFalse(Auth::check());
        }

        $response = $this->loginController->login($request);
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(Response::HTTP_TOO_MANY_REQUESTS, $response->getStatusCode());
    }
}