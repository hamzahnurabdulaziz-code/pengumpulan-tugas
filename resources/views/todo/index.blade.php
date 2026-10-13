@extends('layouts.app')

@section('title', 'Daftar Tugas — 目録一覧')

@section('content')
<!-- ============================================================== -->
<!-- LATAR BELAKANG ANIME HD (FIXED POSITION & GRADIENT OVERLAY)     -->
<!-- ============================================================== -->
<div class="fixed inset-0 pointer-events-none -z-30 overflow-hidden">
    <!-- Gambar Anime HD (Dapat diganti dengan file lokal Anda: {{ asset('images/anime-bg.jpg') }}) -->
    <img
        src="https://images.unsplash.com/photo-1578632767115-351597cf2477?q=80&w=1920&auto=format&fit=crop"
        alt="Anime Aesthetic Japanese Wallpaper"
        class="w-full h-full object-cover object-center scale-105 filter brightness-[0.45] contrast-[1.15] saturate-[1.25] transition-transform duration-1000"
    >

    <!-- Overlay Gradien & Vignette agar Kontras & Keterbacaan Tetap Tajam & Profesional -->
    <div class="absolute inset-0 bg-gradient-to-t from-stone-950 via-stone-950/65 to-stone-950/40"></div>
    <div class="absolute inset-0 bg-radial from-transparent via-stone-950/40 to-stone-950/90"></div>
</div>

<!-- Ambient Silk Glow (Pendaran Spektrum Warna Tradisional Jepang) -->
<div class="relative max-w-4xl mx-auto">
    <!-- Glow Halus Multi-Warna di Latar Belakang -->
    <div class="absolute -top-16 -left-12 w-72 h-72 bg-rose-500/25 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute -top-10 -right-10 w-72 h-72 bg-amber-400/25 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-20 -left-10 w-64 h-64 bg-emerald-500/20 rounded-full blur-[90px] pointer-events-none"></div>
    <div class="absolute -bottom-10 right-1/4 w-80 h-80 bg-violet-600/25 rounded-full blur-[110px] pointer-events-none"></div>

    <!-- Kartu Pembungkus Utama dengan Bingkai Gradien Sutra (Silk Border HD Effect) -->
    <div class="relative p-[1px] rounded-3xl bg-gradient-to-br from-rose-500/50 via-amber-400/40 via-emerald-400/35 to-violet-500/50 shadow-[0_20px_50px_rgba(0,0,0,0.8)] backdrop-blur-2xl">
        <div class="rounded-[23px] bg-stone-950/80 backdrop-blur-3xl p-6 sm:p-10 border border-white/15 space-y-8">

            <!-- Header Halaman & Tombol Aksi Tambah -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 pb-6 border-b border-white/10">
                <div>
                    <!-- Badge Kategori Atas -->
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gradient-to-r from-rose-500/25 via-amber-500/25 to-emerald-500/25 border border-rose-400/35 text-rose-300 text-xs font-medium mb-3 shadow-[0_0_15px_-3px_rgba(244,63,94,0.35)]">
                        <span class="w-2 h-2 rounded-full bg-rose-400 animate-pulse"></span>
                        <span class="font-jp font-semibold">目録</span>
                        <span class="font-mono text-[10px] tracking-wider uppercase text-stone-200">· Task Catalog</span>
                    </div>

                    <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight flex items-center gap-3 drop-shadow-md">
                        <span class="bg-gradient-to-r from-white via-rose-100 to-amber-200 bg-clip-text text-transparent">
                            Daftar Tugas
                        </span>
                        <span class="font-jp text-lg sm:text-xl text-rose-400 font-normal select-none">
                            「一覧記録」
                        </span>
                    </h1>
                    <p class="text-xs sm:text-sm text-stone-300 mt-1 font-light">
                        Catat tugasmu, kerjakan dengan ketenangan, lalu tandai selesai.
                    </p>
                </div>

                <!-- Tombol Tambah Tugas (+ Tambah Tugas) dengan Gradasi Sunset Cerah -->
                <div class="flex items-center gap-3">
                    <a
                        href="{{ route('todos.create') }}"
                        class="relative group inline-flex items-center gap-2.5 px-6 py-3 rounded-2xl bg-gradient-to-r from-rose-500 via-red-500 to-amber-500 text-white text-xs sm:text-sm font-bold shadow-[0_0_25px_-5px_rgba(244,63,94,0.5)] hover:shadow-[0_0_35px_-5px_rgba(245,158,11,0.7)] hover:brightness-110 active:scale-[0.98] transition-all duration-300 shrink-0"
                    >
                        <span class="w-5 h-5 rounded-lg bg-white/20 flex items-center justify-center font-bold text-base leading-none group-hover:rotate-90 transition-transform duration-300">+</span>
                        <span>Tambah Tugas</span>
                        <span class="font-jp text-xs opacity-85 pl-0.5">新規</span>
                    </a>
                </div>
            </div>

            <!-- Mini Summary / Penghitung Status (Fix Bug Perhitungan) -->
            @php
                $totalCount = count($todos);
                $completedCount = $todos->where('is_completed', true)->count();
                $pendingCount = $totalCount - $completedCount;
            @endphp
            <div class="grid grid-cols-3 gap-3 sm:gap-4 p-3 rounded-2xl bg-white/[0.03] border border-white/10 backdrop-blur-md">
                <div class="px-3 py-2 text-center rounded-xl bg-white/[0.03] border border-white/5">
                    <span class="text-[10px] uppercase tracking-wider font-mono text-stone-400 block">Total</span>
                    <span class="text-base sm:text-lg font-bold text-white">{{ $totalCount }}</span>
                    <span class="text-[10px] font-jp text-stone-400 block">全項目</span>
                </div>
                <div class="px-3 py-2 text-center rounded-xl bg-emerald-500/15 border border-emerald-500/30">
                    <span class="text-[10px] uppercase tracking-wider font-mono text-emerald-300 block">Selesai</span>
                    <span class="text-base sm:text-lg font-bold text-emerald-400">{{ $completedCount }}</span>
                    <span class="text-[10px] font-jp text-emerald-400/90 block">達成済</span>
                </div>
                <div class="px-3 py-2 text-center rounded-xl bg-amber-500/15 border border-amber-500/30">
                    <span class="text-[10px] uppercase tracking-wider font-mono text-amber-300 block">Tertunda</span>
                    <span class="text-base sm:text-lg font-bold text-amber-400">{{ $pendingCount }}</span>
                    <span class="text-[10px] font-jp text-amber-400/90 block">未完了</span>
                </div>
            </div>

            <!-- Daftar List Tugas (Card Grid / Stack) -->
            <div class="space-y-3.5">
                @forelse ($todos as $todo)
                    <article class="group relative overflow-hidden rounded-2xl bg-gradient-to-r from-white/[0.05] to-white/[0.02] hover:from-white/[0.09] hover:to-white/[0.04] border border-white/10 hover:border-white/25 p-4 sm:p-5 transition-all duration-300 shadow-md hover:shadow-2xl backdrop-blur-md flex flex-col sm:flex-row sm:items-center justify-between gap-4">

                        <!-- Indikator Garis Pendaran Status Kiri (Glow Accent Edge) -->
                        <div class="absolute left-0 top-3 bottom-3 w-1.5 rounded-r-full {{ $todo->is_completed ? 'bg-gradient-to-b from-emerald-400 to-teal-400 shadow-[0_0_10px_#34d399]' : 'bg-gradient-to-b from-rose-500 to-amber-400 shadow-[0_0_10px_#f43f5e]' }}"></div>

                        <!-- Info Tugas: Judul, Status, & Metadata -->
                        <div class="pl-2.5 sm:pl-3 flex-1 min-w-0">
                            <div class="flex items-center gap-2.5 mb-1.5 flex-wrap">

                                <!-- Status Badge Bergaya Stempel Kanji -->
                                @if ($todo->is_completed)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-950/60 border border-emerald-400/50 text-emerald-300 shadow-[0_0_12px_-2px_rgba(52,211,153,0.4)]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 shadow-[0_0_6px_#34d399]"></span>
                                        <span class="font-jp">済</span>
                                        <span>Selesai</span>
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-amber-950/50 border border-amber-400/50 text-amber-300 shadow-[0_0_12px_-2px_rgba(245,158,11,0.3)]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 shadow-[0_0_6px_#fbbf24]"></span>
                                        <span class="font-jp">未</span>
                                        <span>Belum Selesai</span>
                                    </span>
                                @endif

                                <!-- Priority Tag (Jika ada) -->
                                @if (isset($todo->priority) && $todo->priority === 'high')
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold border border-rose-500/60 bg-rose-950/50 text-rose-300 shadow-[0_0_10px_-2px_rgba(244,63,94,0.4)]">
                                        <span class="font-jp">急</span>
                                        <span>Mendesak</span>
                                    </span>
                                @endif

                                <!-- Waktu Singkat / Deadline -->
                                @if (!empty($todo->due_date))
                                    <span class="text-[11px] text-stone-300 flex items-center gap-1 font-mono">
                                        <span class="font-jp text-amber-400 font-bold">期</span>
                                        <span>{{ \Carbon\Carbon::parse($todo->due_date)->format('d M Y') }}</span>
                                    </span>
                                @endif
                            </div>

                            <!-- Judul Tugas -->
                            <h2 class="text-base sm:text-lg font-bold tracking-tight truncate">
                                <a
                                    href="{{ route('todos.show', $todo) }}"
                                    class="transition-colors {{ $todo->is_completed ? 'text-stone-400 line-through decoration-emerald-500/50 hover:text-stone-200' : 'text-white hover:text-rose-200' }}"
                                >
                                    {{ $todo->title }}
                                </a>
                            </h2>
                        </div>

                        <!-- Action Toolbar (Detail, Edit, Hapus) -->
                        <div class="flex items-center gap-2 pl-2.5 sm:pl-0 shrink-0 border-t sm:border-t-0 border-white/10 pt-3 sm:pt-0">

                            <!-- 1. Tombol Detail (Cyan Silk Glass) -->
                            <a
                                href="{{ route('todos.show', $todo) }}"
                                class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl text-xs font-semibold text-cyan-200 bg-cyan-950/40 hover:bg-cyan-500/25 border border-cyan-400/40 hover:border-cyan-400 shadow-[0_0_10px_-3px_rgba(34,211,238,0.3)] transition-all"
                            >
                                <span class="font-jp text-[11px]">観</span>
                                <span>Detail</span>
                            </a>

                            <!-- 2. Tombol Edit (Yamabuki Gold Glass) -->
                            <a
                                href="{{ route('todos.edit', $todo) }}"
                                class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl text-xs font-semibold text-amber-200 bg-amber-950/40 hover:bg-amber-500/25 border border-amber-400/40 hover:border-amber-400 shadow-[0_0_10px_-3px_rgba(245,158,11,0.3)] transition-all"
                            >
                                <span class="font-jp text-[11px]">改</span>
                                <span>Edit</span>
                            </a>

                            <!-- 3. Tombol Hapus (Rose Crimson Glass) -->
                            <form
                                action="{{ route('todos.destroy', $todo) }}"
                                method="POST"
                                onsubmit="return confirm('Hapus tugas ini?')"
                                class="inline"
                            >
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    aria-label="Hapus tugas {{ $todo->title }}"
                                    class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl text-xs font-semibold text-rose-300 bg-rose-950/40 hover:bg-rose-600/90 hover:text-white border border-rose-500/40 hover:border-rose-500 shadow-[0_0_10px_-3px_rgba(244,63,94,0.3)] transition-all active:scale-95"
                                >
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                    <span>Hapus</span>
                                </button>
                            </form>

                        </div>

                    </article>
                @empty
                    <!-- Zen Empty State (無 · Mu / Kedamaian) -->
                    <div class="py-16 px-6 text-center rounded-2xl bg-black/40 border border-white/10 backdrop-blur-md flex flex-col items-center justify-center space-y-4">
                        <!-- Lingkaran Ensō / Kanji Mu Menyala -->
                        <div class="w-20 h-20 rounded-full border-2 border-dashed border-rose-400/50 flex items-center justify-center font-jp text-3xl font-bold text-rose-300 bg-gradient-to-br from-rose-500/15 via-amber-400/15 to-violet-500/15 shadow-[0_0_25px_-5px_rgba(244,63,94,0.4)] animate-pulse">
                            無
                        </div>
                        <div class="space-y-1">
                            <h3 class="text-base font-bold text-white tracking-wide">Belum Ada Tugas</h3>
                            <p class="text-xs text-stone-300 max-w-sm mx-auto font-light">
                                Pikiran Anda jernih dan tenang. Mulai catat sasaran baru untuk membuka hari yang produktif.
                            </p>
                        </div>
                        <a
                            href="{{ route('todos.create') }}"
                            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-rose-500 to-amber-500 text-white text-xs font-bold shadow-[0_0_20px_-3px_rgba(244,63,94,0.5)] hover:brightness-110 transition-all"
                        >
                            <span>+ Buat Tugas Pertama</span>
                        </a>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</div>
@endsection
