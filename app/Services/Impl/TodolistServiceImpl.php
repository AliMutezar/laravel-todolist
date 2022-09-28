<?php

namespace App\Services\Impl;

use App\Services\TodolistService;
use Illuminate\Support\Facades\Session;

class TodolistServiceImpl implements TodolistService
{
    public function todoSave(string $id, string $todo): void 
    {
        // Karena belum belajar database, jadi data todo-nya kita akan save di session
        if (!Session::exists("todolist")) 
        {
            // Update todolist dengan array kosong 
            Session::put("todolist", []);
        }

        Session::push("todolist", [
            "id"    => $id,
            "todo"  => $todo
        ]);
    }


    public function getTodolist(): array
    {
        return Session::get("todolist", []);
    }
}