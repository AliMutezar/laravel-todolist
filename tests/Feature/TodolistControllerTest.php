<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{
    public function testTodoList()
    {
        $this->withSession([
            "user"     =>  "Ali",
            "todolist" => [
                [
                    "id"    =>  "1",
                    "todo"  =>  "Belajar"
                ],
                [
                    "id"    =>  "2",
                    "todo"  =>  "Bermain"
                ]
            ]
        ])->get('/todolist')
            ->assertSeeText("1")
            ->assertSeeText("Belajar")
            ->assertSeeText("2")
            ->assertSeeText("Bermain");
    }


    public function testTodoAddFailed()
    {
        $this->withSession([
            "user"  =>  "Ali"
        ])->post('/todolist')
            ->assertSeeText("Todolist is Required");
    }


    public function testAddTodoSuccess()
    {
        $this->withSession([
            "user"  =>  "Ali"
        ])->post("/todolist", [
            "todo"  =>  "Belajar"
        ])->assertRedirect('/todolist');
            
    }


    public function testRemoveTodolist()
    {
        $this->withSession([
            "user"     =>  "Ali",
            "todolist" => [
                [
                    "id"    =>  "1",
                    "todo"  =>  "Belajar"
                ],
                [
                    "id"    =>  "2",
                    "todo"  =>  "Bermain"
                ]
            ]
        ])->post("/todolist/1/delete")
            ->assertRedirect("/todolist");
    }
}
