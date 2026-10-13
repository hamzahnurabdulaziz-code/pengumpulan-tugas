@extends('layouts.app')

@section('title', $todo->title . ' — 鑑賞·詳細')

@section('content')
<!-- ============================================================== -->
<!-- LATAR BELAKANG ANIME HD (FIXED POSITION & GRADIENT OVERLAY)     -->
<!-- ============================================================== -->
<div class="fixed inset-0 pointer-events-none -z-30 overflow-hidden">
    <!-- Gambar Anime HD (Bisa diganti dengan asset lokal: {{ asset('images/anime-bg.jpg') }}) -->
    <img
        src="https://images.unsplash.com/photo-1578632767115-351597cf2477?q=80&w=1920&auto=format&fit=crop"
        alt="Anime Aesthetic Japanese Wallpaper"
        class="w-full h-full object-cover object-center scale-105 filter brightness-[0.45] contrast-[1.15] saturate-[1.25] transition-transform duration-1000"
    >

    <!-- Overlay Gradien & Vignette agar UI Tetap Tajam & Profesional -->
    <div class="absolute inset-0 bg-gradient-to-t from-stone-950 via-stone-950/60 to-stone-950/40"></div>
    <div class="absolute inset-0 bg-radial from-transparent via-stone-950/40 to-stone-950/90"></div>
</div>

<!-- Ambient Silk Glow (Pendaran Cahaya Warna-Warni Tradisional) -->
<div class="relative max-w-3xl mx-auto">
    <div class="absolute -top-14 -left-12 w-72 h-72 bg-rose-500/25 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute -top-10 -right-10 w-72 h-72 bg-amber-400/25 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-16 -left-10 w-64 h-64 bg-emerald-500/20 rounded-full blur-[90px] pointer-events-none"></div>
    <div class="absolute -bottom-12 right-1/4 w-80 h-80 bg-violet-600/25 rounded-full blur-[110px] pointer-events-none"></div>

    <!-- Kartu Utama: Frosted Glass Kristal dengan Silk Border HD -->
    <div class="relative p-[1px] rounded-3xl bg-gradient-to-br from-rose-500/50 via-amber-400/40 via-emerald-400/35 to-violet-500/50 shadow-[0_20px_50px_rgba(0,0,0,0.8)] backdrop-blur-2xl">
        <div class="rounded-[23px] bg-stone-950/80 backdrop-blur-3xl p-6 sm:p-10 border border-white/15 space-y-8">

            <!-- Bar Navigasi Atas & Kode Identitas Tugas -->
            <div class="flex items-center justify-between pb-5 border-b border-white/10">
                <a
                    href="{{ route('todos.index') }}"
                    class="group inline-flex items-center gap-2.5 text-xs font-semibold text-stone-300 hover:text-white transition-all duration-200"
                >
                    <span class="w-6 h-6 rounded-lg bg-white/[0.06] border border-white/10 flex items-center justify-center font-jp text-[11px] group-hover:border-amber-400/60 group-hover:text-amber-300 group-hover:-translate-x-0.5 transition-all">←</span>
                    <span>Kembali ke Daftar</span>
                    <span class="font-jp text-[11px] text-stone-400">「一覧」</span>
                </a>

                <!-- Stamp Badge Identitas -->
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/[0.05] border border-white/15 text-stone-200 text-[11px] font-mono tracking-wider shadow-inner">
                    <span class="w-2 h-2 rounded-full bg-gradient-to-r from-rose-400 to-amber-400 animate-pulse"></span>
                    <span>TASK #{{ str_pad($todo->id, 3, '0', STR_PAD_LEFT) }}</span>
                </div>
            </div>

            <!-- Header Rincian: Status, Kategori & Judul Spektakuler -->
            <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-6">
                <div class="space-y-4 flex-1">

                    <!-- Kumpulan Badge Warna-Warni Tradisional Jepang (Nihon no Dentōshoku) -->
                    <div class="flex flex-wrap items-center gap-2.5">

                        <!-- 1. Status Selesai / Proses (Matcha & Yamabuki Glow) -->
                        @if ($todo->is_completed)
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-950/60 border border-emerald-400/60 text-emerald-300 shadow-[0_0_15px_-3px_rgba(52,211,153,0.4)]">
                                <span class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_8px_#34d399] animate-pulse"></span>
                                <span class="font-jp">済</span>
                                <span>Tercapai</span>
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-950/60 border border-amber-400/60 text-amber-300 shadow-[0_0_15px_-3px_rgba(245,158,11,0.35)]">
                                <span class="w-2 h-2 rounded-full bg-amber-400 shadow-[0_0_8px_#fbbf24]"></span>
                                <span class="font-jp">未</span>
                                <span>Sedang Berjalan</span>
                            </span>
                        @endif

                        <!-- 2. Priority Badge Berwarna -->
                        @php
                            $priorityConfig = [
                                'high' => [
                                    'kanji' => '急',
                                    'label' => 'Mendesak',
                                    'style' => 'border-rose-500/70 bg-rose-950/50 text-rose-300 shadow-[0_0_15px_-3px_rgba(244,63,94,0.45)]',
                                    'dot'   => 'bg-rose-400 shadow-[0_0_6px_#f43f5e]'
                                ],
                                'medium' => [
                                    'kanji' => '重',
                                    'label' => 'Penting',
                                    'style' => 'border-amber-400/70 bg-amber-950/50 text-amber-300 shadow-[0_0_15px_-3px_rgba(245,158,11,0.4)]',
                                    'dot'   => 'bg-amber-400 shadow-[0_0_6px_#fbbf24]'
                                ],
                                'low' => [
                                    'kanji' => '普',
                                    'label' => 'Biasa',
                                    'style' => 'border-cyan-400/60 bg-cyan-950/50 text-cyan-300 shadow-[0_0_15px_-3px_rgba(6,182,212,0.35)]',
                                    'dot'   => 'bg-cyan-400 shadow-[0_0_6px_#22d3ee]'
                                ],
                            ][$todo->priority ?? 'low'] ?? [
                                'kanji' => '普',
                                'label' => 'Biasa',
                                'style' => 'border-cyan-400/60 bg-cyan-950/50 text-cyan-300 shadow-[0_0_15px_-3px_rgba(6,182,212,0.35)]',
                                'dot'   => 'bg-cyan-400 shadow-[0_0_6px_#22d3ee]'
                            ];
                        @endphp
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold border {{ $priorityConfig['style'] }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $priorityConfig['dot'] }}"></span>
                            <span class="font-jp">{{ $priorityConfig['kanji'] }}</span>
                            <span>{{ $priorityConfig['label'] }}</span>
                        </span>

                        <!-- 3. Category Badge (Sakura / Matcha / Indigo / Fuji) -->
                        @php
                            $categoryConfig = [
                                'sakura' => ['name' => 'Sakura', 'kanji' => '桜', 'badge' => 'border-pink-400/60 bg-pink-950/50 text-pink-300 shadow-[0_0_12px_-3px_rgba(244,114,182,0.4)]', 'dot' => 'bg-pink-400 shadow-[0_0_6px_#f472b6]'],
                                'matcha' => ['name' => 'Matcha', 'kanji' => '翠', 'badge' => 'border-emerald-400/60 bg-emerald-950/50 text-emerald-300 shadow-[0_0_12px_-3px_rgba(52,211,153,0.4)]', 'dot' => 'bg-emerald-400 shadow-[0_0_6px_#34d399]'],
                                'indigo' => ['name' => 'Indigo', 'kanji' => '藍', 'badge' => 'border-cyan-400/60 bg-cyan-950/50 text-cyan-300 shadow-[0_0_12px_-3px_rgba(34,211,238,0.4)]', 'dot' => 'bg-cyan-400 shadow-[0_0_6px_#22d3ee]'],
                                'fuji'   => ['name' => 'Fuji',   'kanji' => '藤', 'badge' => 'border-purple-400/60 bg-purple-950/50 text-purple-300 shadow-[0_0_12px_-3px_rgba(192,132,252,0.4)]', 'dot' => 'bg-purple-400 shadow-[0_0_6px_#c084fc]'],
                            ][$todo->category ?? 'sakura'] ?? null;
                        @endphp
                        @if ($categoryConfig)
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold border {{ $categoryConfig['badge'] }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $categoryConfig['dot'] }}"></span>
                                <span class="font-jp">{{ $categoryConfig['kanji'] }}</span>
                                <span>{{ $categoryConfig['name'] }}</span>
                            </span>
                        @endif

                    </div>

                    <!-- Judul Tugas HD Gradient -->
                    <h1 class="text-2xl sm:text-4xl font-extrabold tracking-tight leading-snug drop-shadow-md">
                        <span class="bg-gradient-to-r from-white via-rose-100 to-amber-200 bg-clip-text text-transparent">
                            {{ $todo->title }}
                        </span>
                    </h1>
                </div>

                <!-- Ornamen Hanko Kanan: 華 (Hana / Keindahan Elegan) -->
                <div class="hidden sm:flex flex-col items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-rose-500/25 via-purple-500/25 to-amber-500/25 border border-white/25 shadow-xl text-rose-300 select-none shrink-0 backdrop-blur-md">
                    <span class="font-jp text-xl font-bold">華</span>
                    <span class="text-[8px] tracking-widest text-stone-300 uppercase font-sans">MIYABI</span>
                </div>
            </div>

            <!-- Kotak Rincian Catatan (Frosted Glass Inset) -->
            <div class="relative overflow-hidden rounded-2xl bg-black/45 border border-white/15 p-6 sm:p-7 shadow-inner backdrop-blur-md">
                <!-- Aksen Garis Gradasi Sutra di Sudut Atas -->
                <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-rose-500 via-amber-400 to-violet-500 opacity-80"></div>

                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xs font-bold tracking-wider text-stone-300 uppercase flex items-center gap-2">
                        <span class="w-1.5 h-3.5 bg-gradient-to-b from-rose-400 to-amber-400 rounded-full"></span>
                        <span>Catatan & Uraian Objektif</span>
                    </h2>
                    <span class="font-jp text-xs text-rose-300/80">詳細情報メモ</span>
                </div>

                <div class="text-sm leading-relaxed text-stone-100 whitespace-pre-line font-light">
                    @if (!empty($todo->description))
                        {{ $todo->description }}
                    @else
                        <div class="flex items-center gap-2 text-stone-400 italic py-2">
                            <span class="font-jp text-sm">空</span>
                            <span>Tidak ada catatan atau instruksi tambahan untuk sasaran ini.</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Grid Metadata Waktu & Tenggat -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <!-- Tenggat Waktu (Yamabuki Gold Accent) -->
                <div class="p-4 rounded-2xl bg-white/[0.04] border border-white/10 flex items-center gap-3.5 hover:border-amber-400/50 transition-all backdrop-blur-md">
                    <div class="w-11 h-11 rounded-xl bg-amber-500/20 border border-amber-400/50 flex items-center justify-center font-jp text-base font-bold text-amber-300 shrink-0 shadow-[0_0_12px_-2px_rgba(245,158,11,0.3)]">
                        期
                    </div>
                    <div>
                        <span class="block text-[10px] font-bold text-amber-400/90 uppercase tracking-widest font-mono">Tenggat Waktu</span>
                        <span class="text-xs sm:text-sm font-semibold text-white">
                            @if ($todo->due_date)
                                {{ \Carbon\Carbon::parse($todo->due_date)->isoFormat('dddd, D MMMM Y') }}
                            @else
                                <span class="text-stone-400 font-normal">Tidak ditetapkan</span>
                            @endif
                        </span>
                    </div>
                </div>

                <!-- Waktu Dibuat (Fuji Murasaki Accent) -->
                <div class="p-4 rounded-2xl bg-white/[0.04] border border-white/10 flex items-center gap-3.5 hover:border-violet-400/50 transition-all backdrop-blur-md">
                    <div class="w-11 h-11 rounded-xl bg-violet-500/20 border border-violet-400/50 flex items-center justify-center font-jp text-base font-bold text-violet-300 shrink-0 shadow-[0_0_12px_-2px_rgba(192,132,252,0.3)]">
                        時
                    </div>
                    <div>
                        <span class="block text-[10px] font-bold text-violet-400/90 uppercase tracking-widest font-mono">Waktu Pencatatan</span>
                        <span class="text-xs sm:text-sm font-semibold text-white">
                            {{ $todo->created_at ? $todo->created_at->isoFormat('D MMMM Y · HH:mm') : '-' }}
                        </span>
                    </div>
                </div>

            </div>

            <!-- Toolbar Aksi Bawah: Hapus & Ubah -->
            <div class="flex items-center justify-between pt-6 border-t border-white/10">

                <!-- Tombol Hapus (Glowing Crimson Silk Outline) -->
                <form
                    action="{{ route('todos.destroy', $todo->id) }}"
                    method="POST"
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus agenda ini? Langkah ini tidak dapat dibatalkan.');"
                >
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 px-4.5 py-2.5 rounded-xl text-xs font-semibold text-rose-300 hover:text-white bg-rose-950/40 hover:bg-rose-600/90 border border-rose-500/40 hover:border-rose-400 shadow-[0_0_15px_-3px_rgba(244,63,94,0.25)] hover:shadow-[0_0_20px_-3px_rgba(244,63,94,0.6)] transition-all duration-200 active:scale-95 backdrop-blur-md"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                        <span>Hapus Sasaran</span>
                    </button>
                </form>

                <!-- Tombol Ubah (Miyabi Sunset Glow Button) -->
                <a
                    href="{{ route('todos.edit', $todo->id) }}"
                    class="relative group inline-flex items-center gap-2.5 px-6 py-2.5 rounded-xl bg-gradient-to-r from-amber-500 via-rose-500 to-violet-600 text-white text-xs sm:text-sm font-bold shadow-[0_0_25px_-5px_rgba(245,158,11,0.5)] hover:shadow-[0_0_35px_-5px_rgba(244,63,94,0.7)] hover:brightness-110 active:scale-[0.98] transition-all duration-300"
                >
                    <span class="font-jp text-xs opacity-90">改</span>
                    <span>Ubah Sasaran</span>
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
