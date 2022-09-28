<?php

namespace App\Http\Controllers;

use App\Services\TodolistService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TodolistController extends Controller
{

    private TodolistService $todoListService;
    public function __construct(TodolistService $todoListService)
    {
        $this->todoListService = $todoListService;
    }


    public function todoList(Request $request)
    {
        $todoList = $this->todoListService->getTodolist();
        return response()->view("todolist.todolist", [
            "title"     =>  "Todolist Page",
            "todolist"  =>  $todoList
        ]);
    }


    public function addTodo(Request $request)
    {

        $todo = $request->input("todo");
        if (empty($todo)) {
            $todolist = $this->todoListService->getTodolist();
            return response()->view("todolist.todolist", [
                "title"     =>  "Add Todolist",
                "todolist"  =>  $todolist,
                "error"     =>  "Todolist is Required"
            ]);
        }

        $this->todoListService->todoSave(uniqid(), $todo);
        return redirect()->action([TodolistController::class, 'todoList']);

    }


    public function removeTodo(Request $request, string $todoId) : RedirectResponse
    {
        $this->todoListService->removeTodolist($todoId);
        return redirect()->action([TodolistController::class, 'todoList']);
    }
}


