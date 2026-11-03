<?php

namespace App\Livewire;

use App\Models\Todo;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TodoList extends Component
{
    /**
     * Input teks judul tugas baru.
     */
    public string $title = '';

    /**
     * Tag kategori tugas (preset Jepang).
     */
    public string $tag = '日常';

    /**
     * Filter aktif: 'all', 'active', 'completed'.
     */
    public string $filter = 'all';

    /**
     * Pencarian instan (opsional).
     */
    public string $search = '';

    /**
     * Aturan validasi input form.
     *
     * @return array<string, string>
     */
    protected function rules(): array
    {
        return [
            'title' => 'required|string|min:1|max:255',
            'tag' => 'nullable|string|max:50',
        ];
    }

    /**
     * Menambahkan tugas baru ke dalam database.
     */
    public function add(): void
    {
        $this->validate();

        Todo::create([
            'title' => trim($this->title),
            'description' => $this->tag ?: '日常',
            'is_completed' => false,
        ]);

        $this->reset('title');
        $this->dispatch('todo-sound', type: 'add');
    }

    /**
     * Mengubah status penyelesaian tugas (selesai / belum).
     */
    public function toggle(int $id): void
    {
        $todo = Todo::find($id);

        if ($todo) {
            $todo->is_completed = ! $todo->is_completed;
            $todo->save();

            $this->dispatch('todo-sound', type: $todo->is_completed ? 'complete' : 'add');

            if ($todo->is_completed) {
                $this->dispatch('stardust-burst', id: $id);
            }
        }
    }

    /**
     * Menghapus tugas dari database.
     */
    public function delete(int $id): void
    {
        $todo = Todo::find($id);

        if ($todo) {
            $todo->delete();
            $this->dispatch('todo-sound', type: 'delete');
        }
    }

    /**
     * Mengatur filter tampilan tugas.
     */
    public function setFilter(string $filter): void
    {
        $this->filter = in_array($filter, ['all', 'active', 'completed'], true) ? $filter : 'all';
    }

    /**
     * Mengatur pilihan tag kategori secara cepat.
     */
    public function setTag(string $tag): void
    {
        $this->tag = $tag;
    }

    /**
     * Menghapus seluruh tugas yang telah berstatus selesai.
     */
    public function clearCompleted(): void
    {
        Todo::where('is_completed', true)->delete();
        $this->dispatch('todo-sound', type: 'delete');
    }

    /**
     * Mengisi ulang data contoh tugas bernuansa Zen Shinto.
     */
    public function resetSampleTasks(): void
    {
        Todo::truncate();

        Todo::create([
            'title' => 'Membaca Kitab Zen & Refleksi 30 Menit (読書と瞑想)',
            'description' => '精神',
            'is_completed' => false,
        ]);

        Todo::create([
            'title' => 'Rancang Arsitektur Zero Gravity UI (電脳構造設計)',
            'description' => '修行',
            'is_completed' => false,
        ]);

        Todo::create([
            'title' => 'Menikmati seduhan teh hijau matcha di angkasa (宇宙茶道)',
            'description' => '日常',
            'is_completed' => true,
        ]);

        $this->dispatch('todo-sound', type: 'add');
    }

    /**
     * Render komponen Livewire.
     */
    public function render(): View
    {
        $query = Todo::query()->latest('id');

        if ($this->search !== '') {
            $query->where('title', 'like', '%'.$this->search.'%');
        }

        if ($this->filter === 'active') {
            $query->where('is_completed', false);
        } elseif ($this->filter === 'completed') {
            $query->where('is_completed', true);
        }

        $todos = $query->get();

        $totalCount = Todo::count();
        $activeCount = Todo::where('is_completed', false)->count();
        $completedCount = Todo::where('is_completed', true)->count();

        return view('livewire.todo-list', compact('todos', 'totalCount', 'activeCount', 'completedCount'));
    }
}
