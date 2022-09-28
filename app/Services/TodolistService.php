<?php

namespace App\Services;

interface TodolistService
{
    public function todoSave(string $id, string $todo): void;
    public function getTodolist(): array;
    public function removeTodolist(string $todoId);
}