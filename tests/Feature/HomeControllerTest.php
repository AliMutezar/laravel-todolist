<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{

    // Kalo belum login, arahain ke login page
    public function testGuest()
    {
        $this->get('/')
            ->assertRedirect("/login");
    }


    // Kalo udah login, arahin ke todolist page management
    public function testMember()
    {
        $this->withSession([
            "user"  =>  "Ali"
        ])->get('/')
            ->assertRedirect("/todolist");
    }

    
}
