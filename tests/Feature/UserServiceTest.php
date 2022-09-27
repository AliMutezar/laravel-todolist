<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserService $userServices;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userService = $this->app->make(UserService::class);
    }

    
    public function testLoginSuccess()
    {
        self::assertTrue($this->userService->login("Ali", "rahasia"));
    }


    public function testLoginUserNotFound()
    {
        self::assertFalse($this->userService->login("Ali", "Ali"));
    }

    public function testWrongPassword()
    {
        self::assertFalse($this->userService->login("Ali", "salah"));
    }
}
