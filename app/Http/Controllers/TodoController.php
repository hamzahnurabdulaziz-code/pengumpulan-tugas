<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Menampilkan semua tugas
    public function index()
    {
        $todos = Todo::latest('id')->get();

        return view('todo.index', compact('todos'));
    }

    // Menampilkan form tambah tugas
    public function create()
    {
        return view('todo.create');
    }

    // Menyimpan tugas baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'is_completed' => ['sometimes', 'boolean'],
        ], [
            'title.required' => 'Judul wajib diisi.',
            'title.string' => 'Judul harus berupa teks.',
            'title.max' => 'Judul maksimal 255 karakter.',
        ]);

        Todo::create([
            'name' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'is_completed' => $request->boolean('is_completed'),
        ]);

        return redirect()->route('todos.index')
            ->with('success', 'Tugas berhasil ditambahkan.');
    }

    // Menampilkan detail tugas
    public function show(Todo $todo)
    {
        return view('todo.show', compact('todo'));
    }

    // Menampilkan form edit tugas
    public function edit(Todo $todo)
    {
        return view('todo.edit', compact('todo'));
    }

    // Memperbarui tugas
    public function update(Request $request, Todo $todo)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'is_completed' => ['sometimes', 'boolean'],
        ]);

        $todo->update([
            'name' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'is_completed' => $request->boolean('is_completed'),
        ]);

        return redirect()->route('todos.index')
            ->with('success', 'Tugas berhasil diperbarui.');
    }

    // Menghapus tugas
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index')
            ->with('success', 'Tugas berhasil dihapus.');
    }
}
