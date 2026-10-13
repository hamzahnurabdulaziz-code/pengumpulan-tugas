@extends('layouts.app')

@section('title', 'Ubah Tugas — ' . $todo->title)

@section('content')
<!-- ============================================================== -->
<!-- LATAR BELAKANG ANIME HD (FIXED POSITION & GRADIENT OVERLAY)     -->
<!-- ============================================================== -->
<div class="fixed inset-0 pointer-events-none -z-30 overflow-hidden">
    <!-- Gambar Anime HD (Ganti ke file lokal Anda: {{ asset('images/anime-bg.jpg') }}) -->
    <img
        src="https://images.unsplash.com/photo-1578632767115-351597cf2477?q=80&w=1920&auto=format&fit=crop"
        alt="Anime Aesthetic Japanese Wallpaper"
        class="w-full h-full object-cover object-center scale-105 filter brightness-[0.45] contrast-[1.15] saturate-[1.25] transition-transform duration-1000"
    >

    <!-- Overlay Gradien & Vignette agar Kontras & Readability Tetap Maksimal -->
    <div class="absolute inset-0 bg-gradient-to-t from-stone-950 via-stone-950/60 to-stone-950/40"></div>
    <div class="absolute inset-0 bg-radial from-transparent via-stone-950/40 to-stone-950/90"></div>
</div>

<!-- Ambient Silk Glow (Pendaran Cahaya Multi-Warna Tradisional Jepang) -->
<div class="relative max-w-3xl mx-auto">
    <!-- Pendaran Warna Spektrum Halus di Belakang Kartu -->
    <div class="absolute -top-14 -left-10 w-72 h-72 bg-amber-400/25 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute -top-10 -right-10 w-64 h-64 bg-rose-500/25 rounded-full blur-[90px] pointer-events-none"></div>
    <div class="absolute bottom-12 -left-8 w-64 h-64 bg-emerald-500/20 rounded-full blur-[85px] pointer-events-none"></div>
    <div class="absolute -bottom-10 right-1/4 w-72 h-72 bg-violet-500/25 rounded-full blur-[95px] pointer-events-none"></div>

    <!-- Kartu Utama: Frosted Glass Kristal dengan Silk Border HD -->
    <div class="relative p-[1px] rounded-3xl bg-gradient-to-br from-amber-400/50 via-rose-500/40 via-emerald-400/35 to-violet-500/50 shadow-[0_20px_50px_rgba(0,0,0,0.8)] backdrop-blur-2xl">
        <div class="rounded-[23px] bg-stone-950/80 backdrop-blur-3xl p-6 sm:p-10 border border-white/15">

            <!-- Header Halaman: Indah, Elegan & Penuh Makna -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-8 mb-8 border-b border-white/10 gap-4">
                <div>
                    <!-- Badge Status Pembaruan -->
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gradient-to-r from-amber-500/25 via-rose-500/25 to-purple-500/25 border border-amber-400/40 text-amber-300 text-xs font-medium mb-3 shadow-[0_0_15px_-3px_rgba(245,158,11,0.35)]">
                        <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                        <span class="font-jp font-semibold">改善</span>
                        <span class="font-mono text-[10px] tracking-wider uppercase text-stone-200">· Edit Objective</span>
                    </div>

                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight flex items-center gap-3 drop-shadow-md">
                        <span class="bg-gradient-to-r from-white via-amber-100 to-rose-200 bg-clip-text text-transparent">
                            Ubah Tugas
                        </span>
                        <span class="font-jp text-lg sm:text-xl text-amber-400 font-normal select-none">
                            「更新·編集」
                        </span>
                    </h1>
                    <p class="text-xs sm:text-sm text-stone-300 mt-1.5 font-light">
                        Perbarui rincian dan selaraskan kembali target produktivitas Anda.
                    </p>
                </div>

                <!-- Ornamen Hanko Multi-Warna: 改 (Kaizen / Perbaikan Berkelanjutan) -->
                <div class="hidden sm:flex flex-col items-center justify-center w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-500/25 via-rose-500/25 to-purple-500/25 border border-white/25 shadow-xl text-amber-300 select-none backdrop-blur-md">
                    <span class="font-jp text-lg font-bold">改</span>
                    <span class="text-[8px] tracking-widest text-stone-300 uppercase font-sans">KAIZEN</span>
                </div>
            </div>

            <!-- Form Body -->
            <form action="{{ route('todos.update', $todo->id) }}" method="POST" class="space-y-7">
                @csrf
                @method('PUT')

                <!-- 1. Status Penyelesaian Tugas (Zen Status Switcher) -->
                <div class="p-4 sm:p-5 rounded-2xl bg-white/[0.04] border border-white/10 flex items-center justify-between transition-all hover:border-white/20 backdrop-blur-md">
                    <div class="flex items-center gap-3.5">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center font-jp text-sm font-bold shadow-inner transition-colors {{ $todo->is_completed ? 'bg-emerald-500/25 border border-emerald-400/60 text-emerald-300 shadow-[0_0_15px_-3px_rgba(52,211,153,0.4)]' : 'bg-amber-500/25 border border-amber-400/50 text-amber-300 shadow-[0_0_15px_-3px_rgba(245,158,11,0.3)]' }}">
                            {{ $todo->is_completed ? '済' : '未' }}
                        </div>
                        <div>
                            <label for="is_completed" class="text-xs sm:text-sm font-bold text-white cursor-pointer block">
                                Progres Penyelesaian
                            </label>
                            <p class="text-[11px] text-stone-300">
                                {{ $todo->is_completed ? 'Target telah tercapai (Selesai)' : 'Masih dalam proses pengerjaan' }}
                            </p>
                        </div>
                    </div>

                    <!-- Custom Glowing Toggle Switch -->
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input
                            type="checkbox"
                            id="is_completed"
                            name="is_completed"
                            value="1"
                            class="sr-only peer"
                            {{ old('is_completed', $todo->is_completed) ? 'checked' : '' }}
                        >
                        <div class="w-12 h-6 bg-stone-800/90 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-6 peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-stone-300 peer-checked:after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gradient-to-r peer-checked:from-emerald-500 peer-checked:to-teal-400 border border-white/15 peer-checked:border-emerald-300 shadow-inner peer-checked:shadow-[0_0_15px_rgba(16,185,129,0.5)]"></div>
                    </label>
                </div>

                <!-- 2. Judul Tugas -->
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <label for="title" class="block text-xs font-bold tracking-wider text-stone-200 uppercase">
                            Judul Agenda <span class="text-rose-400">*</span>
                        </label>
                        <span class="text-[11px] font-jp text-amber-300/90">目標名</span>
                    </div>
                    <div class="relative group">
                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title', $todo->title) }}"
                            class="w-full px-4 py-3.5 rounded-2xl bg-black/40 border border-white/15 text-white placeholder-stone-500 text-sm focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-400/30 focus:bg-white/[0.07] transition-all duration-200 shadow-inner backdrop-blur-sm @error('title') !border-rose-500 !ring-rose-500/40 @enderror"
                            required
                        >
                    </div>
                    @error('title')
                        <p class="text-xs text-rose-400 flex items-center gap-1.5 mt-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-rose-400"></span>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- 3. Kategori & Nuansa Warna Jepang (Nihon no Dentōshoku) -->
                <div class="space-y-2.5">
                    <label class="block text-xs font-bold tracking-wider text-stone-200 uppercase">
                        Kategori & Nuansa Warna
                    </label>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5">

                        <!-- Sakura / Pribadi -->
                        <label class="cursor-pointer">
                            <input type="radio" name="category" value="sakura" class="peer sr-only" {{ old('category', $todo->category ?? 'sakura') == 'sakura' ? 'checked' : '' }}>
                            <div class="p-3 rounded-xl border border-white/10 bg-black/30 backdrop-blur-sm transition-all peer-checked:border-pink-400 peer-checked:bg-pink-950/50 peer-checked:shadow-[0_0_15px_-3px_rgba(244,114,182,0.4)] hover:border-pink-400/40">
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-pink-400 shadow-[0_0_8px_#f472b6]"></span>
                                    <span class="text-xs font-semibold text-pink-200">Sakura</span>
                                </div>
                                <span class="text-[10px] text-stone-300 font-jp block mt-1">桜 · Pribadi</span>
                            </div>
                        </label>

                        <!-- Matcha / Studi -->
                        <label class="cursor-pointer">
                            <input type="radio" name="category" value="matcha" class="peer sr-only" {{ old('category', $todo->category ?? '') == 'matcha' ? 'checked' : '' }}>
                            <div class="p-3 rounded-xl border border-white/10 bg-black/30 backdrop-blur-sm transition-all peer-checked:border-emerald-400 peer-checked:bg-emerald-950/50 peer-checked:shadow-[0_0_15px_-3px_rgba(52,211,153,0.4)] hover:border-emerald-400/40">
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 shadow-[0_0_8px_#34d399]"></span>
                                    <span class="text-xs font-semibold text-emerald-200">Matcha</span>
                                </div>
                                <span class="text-[10px] text-stone-300 font-jp block mt-1">翠 · Belajar</span>
                            </div>
                        </label>

                        <!-- Indigo / Pekerjaan -->
                        <label class="cursor-pointer">
                            <input type="radio" name="category" value="indigo" class="peer sr-only" {{ old('category', $todo->category ?? '') == 'indigo' ? 'checked' : '' }}>
                            <div class="p-3 rounded-xl border border-white/10 bg-black/30 backdrop-blur-sm transition-all peer-checked:border-cyan-400 peer-checked:bg-cyan-950/50 peer-checked:shadow-[0_0_15px_-3px_rgba(34,211,238,0.4)] hover:border-cyan-400/40">
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-cyan-400 shadow-[0_0_8px_#22d3ee]"></span>
                                    <span class="text-xs font-semibold text-cyan-200">Indigo</span>
                                </div>
                                <span class="text-[10px] text-stone-300 font-jp block mt-1">藍 · Pekerjaan</span>
                            </div>
                        </label>

                        <!-- Fuji / Khusus -->
                        <label class="cursor-pointer">
                            <input type="radio" name="category" value="fuji" class="peer sr-only" {{ old('category', $todo->category ?? '') == 'fuji' ? 'checked' : '' }}>
                            <div class="p-3 rounded-xl border border-white/10 bg-black/30 backdrop-blur-sm transition-all peer-checked:border-purple-400 peer-checked:bg-purple-950/50 peer-checked:shadow-[0_0_15px_-3px_rgba(192,132,252,0.4)] hover:border-purple-400/40">
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-purple-400 shadow-[0_0_8px_#c084fc]"></span>
                                    <span class="text-xs font-semibold text-purple-200">Fuji</span>
                                </div>
                                <span class="text-[10px] text-stone-300 font-jp block mt-1">藤 · Prioritas</span>
                            </div>
                        </label>

                    </div>
                </div>

                <!-- 4. Deskripsi / Catatan Rincian -->
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <label for="description" class="block text-xs font-bold tracking-wider text-stone-200 uppercase">
                            Catatan & Rincian
                        </label>
                        <span class="text-[11px] font-jp text-stone-400">詳細情報</span>
                    </div>
                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                        class="w-full px-4 py-3.5 rounded-2xl bg-black/40 border border-white/15 text-white placeholder-stone-500 text-sm focus:outline-none focus:border-rose-400 focus:ring-2 focus:ring-rose-400/25 focus:bg-white/[0.07] transition-all resize-y shadow-inner backdrop-blur-sm @error('description') !border-rose-500 @enderror"
                    >{{ old('description', $todo->description) }}</textarea>
                    @error('description')
                        <p class="text-xs text-rose-400 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <!-- 5. Grid: Tingkat Urgensi & Tanggal Jatuh Tempo -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-1">

                    <!-- Urgensi Berwarna -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold tracking-wider text-stone-200 uppercase">
                            Tingkat Urgensi
                        </label>
                        <div class="grid grid-cols-3 gap-2">
                            <!-- Biasa (Futsuu) -->
                            <label class="cursor-pointer">
                                <input type="radio" name="priority" value="low" class="peer sr-only" {{ old('priority', $todo->priority ?? 'low') == 'low' ? 'checked' : '' }}>
                                <div class="px-3 py-2.5 rounded-xl border border-white/10 bg-black/30 backdrop-blur-sm text-center transition-all peer-checked:border-cyan-400/70 peer-checked:bg-cyan-500/20 peer-checked:text-cyan-200 peer-checked:shadow-[0_0_15px_-3px_rgba(6,182,212,0.35)] hover:border-white/20">
                                    <span class="block text-[11px] font-jp text-cyan-400 font-semibold">普</span>
                                    <span class="text-xs font-medium text-stone-200">Biasa</span>
                                </div>
                            </label>

                            <!-- Penting (Juu) -->
                            <label class="cursor-pointer">
                                <input type="radio" name="priority" value="medium" class="peer sr-only" {{ old('priority', $todo->priority) == 'medium' ? 'checked' : '' }}>
                                <div class="px-3 py-2.5 rounded-xl border border-white/10 bg-black/30 backdrop-blur-sm text-center transition-all peer-checked:border-amber-400/80 peer-checked:bg-amber-500/20 peer-checked:text-amber-200 peer-checked:shadow-[0_0_15px_-3px_rgba(245,158,11,0.4)] hover:border-white/20">
                                    <span class="block text-[11px] font-jp text-amber-400 font-semibold">重</span>
                                    <span class="text-xs font-medium text-stone-200">Penting</span>
                                </div>
                            </label>

                            <!-- Mendesak (Kyuu) -->
                            <label class="cursor-pointer">
                                <input type="radio" name="priority" value="high" class="peer sr-only" {{ old('priority', $todo->priority) == 'high' ? 'checked' : '' }}>
                                <div class="px-3 py-2.5 rounded-xl border border-white/10 bg-black/30 backdrop-blur-sm text-center transition-all peer-checked:border-rose-500 peer-checked:bg-rose-950/50 peer-checked:text-rose-200 peer-checked:shadow-[0_0_20px_-3px_rgba(244,63,94,0.5)] hover:border-white/20">
                                    <span class="block text-[11px] font-jp text-rose-400 font-semibold">急</span>
                                    <span class="text-xs font-medium text-stone-200">Mendesak</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Tanggal Tenggat -->
                    <div class="space-y-2">
                        <label for="due_date" class="block text-xs font-bold tracking-wider text-stone-200 uppercase">
                            Tenggat Waktu
                        </label>
                        <input
                            type="date"
                            id="due_date"
                            name="due_date"
                            value="{{ old('due_date', optional($todo->due_date)->format('Y-m-d') ?? $todo->due_date) }}"
                            class="w-full px-4 py-3 rounded-2xl bg-black/40 border border-white/15 text-white text-sm focus:outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-400/30 transition-all backdrop-blur-sm [color-scheme:dark]"
                        >
                    </div>
                </div>

                <!-- Tombol Aksi Bawah -->
                <div class="flex items-center justify-between pt-6 border-t border-white/10">
                    <a
                        href="{{ route('todos.index') }}"
                        class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-medium text-stone-300 hover:text-white border border-white/15 hover:border-white/30 bg-white/[0.04] hover:bg-white/[0.08] transition-all backdrop-blur-sm"
                    >
                        Batal
                    </a>

                    <!-- Tombol Perbarui: Gradien Yamabuki ke Sunset Vermilion -->
                    <button
                        type="submit"
                        class="relative group inline-flex items-center gap-2.5 px-7 py-3 rounded-xl bg-gradient-to-r from-amber-500 via-rose-500 to-violet-600 text-white text-xs sm:text-sm font-bold shadow-[0_0_25px_-5px_rgba(245,158,11,0.5)] hover:shadow-[0_0_35px_-5px_rgba(244,63,94,0.7)] hover:brightness-110 active:scale-[0.98] transition-all duration-300"
                    >
                        <span class="font-jp text-xs opacity-90">更</span>
                        <span>Perbarui Agenda</span>
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
