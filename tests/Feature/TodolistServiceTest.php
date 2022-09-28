<?php

namespace Tests\Feature;

use App\Services\TodolistService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class TodolistServiceTest extends TestCase
{
    // Memastikan serviceProvider Todolistnya ada atau ngga
    private TodolistService $todoListService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->todoListService = $this->app->make(TodolistService::class);
    }


    public function testTodoListNotNull()
    {
        self::assertNotNull($this->todoListService);
    }


    public function testSaveTodo()
    {
        $this->todoListService->todoSave("1", "Belajar Laravel Todolist");
        $todolist = Session::get("todolist");
        foreach ($todolist as $value) {
            self::assertEquals("1", $value['id']);
            self::assertEquals("Belajar Laravel Todolist", $value['todo']);
        }
    }


    public function testGetTodoEmpty()
    {
        self::assertEquals([], $this->todoListService->getTodolist());
    }


    public function testGetTodoNotEmpty()
    {
        $expected = [
            [
                "id"    =>  "1",
                "todo"  =>  "Makan"
            ],
            [
                "id"    =>  "2",
                "todo"  =>  "Minum"
            ],
        ];

        $this->todoListService->todoSave("1", "Makan");
        $this->todoListService->todoSave("2", "Minum");

        self::assertEquals($expected, $this->todoListService->getTodolist());
    }

    
}
