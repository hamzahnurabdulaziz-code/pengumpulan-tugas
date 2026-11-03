<?php

use App\Livewire\TodoList;
use Illuminate\Support\Facades\Route;

Route::get('/', TodoList::class)->name('home');
Route::get('/todos', TodoList::class)->name('todos.index');
