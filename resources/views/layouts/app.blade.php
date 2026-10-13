<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Daftar Tugas') — Todo</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font: Zen Kaku Gothic New -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@400;500;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Zen Kaku Gothic New"', 'sans-serif'],
                    },
                    colors: {
                        washi: '#F9F8F6',
                        sumi: '#1C1B1A',
                        torii: '#C93B2B',
                        matcha: '#4A6B53',
                        tatami: '#EFECE6',
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-full flex flex-col bg-washi text-sumi font-sans antialiased selection:bg-torii/15 selection:text-torii">

    <!-- Header / Navigasi -->
    <header class="border-b border-stone-200/80 bg-washi/90 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-6 h-16 flex items-center justify-between">
            <a href="{{ route('todos.index') }}" class="group flex items-center gap-3 transition-opacity hover:opacity-85">
                <!-- Aksen Lingkaran Enso / Stempel Hanko -->
                <span class="w-7 h-7 rounded-md bg-torii text-white text-xs font-bold flex items-center justify-center tracking-tighter shadow-sm group-hover:scale-105 transition-transform">
                    ToDo
                </span>
                <span class="text-sm font-semibold tracking-wider text-stone-800 uppercase">
                    Todo <span class="text-stone-400 font-light mx-1">/</span> <span class="text-stone-500 font-normal">Belajar Laravel</span>
                </span>
            </a>
            <div class="text-xs tracking-widest text-stone-400 font-medium uppercase">
                タスク管理
            </div>
        </div>
    </header>

    <!-- Konten Utama -->
    <main class="flex-1 max-w-4xl w-full mx-auto px-6 py-10">

        <!-- Flash Alert: Sukses (Aksen Matcha) -->
        @if (session('success'))
        <div role="status" class="mb-6 flex items-start gap-3 rounded-lg border border-emerald-200/90 bg-emerald-50/70 p-4 text-sm text-emerald-900 shadow-sm backdrop-blur-sm">
            <svg class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <div class="font-medium leading-relaxed">
                {{ session('success') }}
            </div>
        </div>
        @endif

        <!-- Flash Alert: Validasi Error (Aksen Torii / Shu-iro) -->
        @if ($errors->any())
        <div role="alert" class="mb-6 rounded-lg border border-red-200/90 bg-red-50/70 p-4.5 text-sm text-red-900 shadow-sm backdrop-blur-sm">
            <div class="flex items-center gap-2 font-semibold text-torii mb-2">
                <svg class="w-4.5 h-4.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                <span>Periksa kembali isianmu:</span>
            </div>
            <ul class="list-disc list-inside space-y-1 text-red-800/90 pl-1 text-xs sm:text-sm">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Dynamic Content -->
        <div class="bg-white/70 border border-stone-200/80 rounded-xl p-6 sm:p-8 shadow-[0_4px_24px_-4px_rgba(28,27,26,0.04)] backdrop-blur-sm">
            @yield('content')
        </div>

    </main>

    <!-- Footer -->
    <footer class="border-t border-stone-200/80 bg-washi py-6 mt-auto">
        <div class="max-w-4xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-stone-400">
            <div class="flex items-center gap-2">
                <span class="inline-block w-1.5 h-1.5 rounded-full bg-torii/80"></span>
                <span>Latihan CRUD · Laravel 13 · Blade · SQLite</span>
            </div>
            <div class="tracking-widest text-[11px] font-mono text-stone-400">
                無為自然 · MINIMALIST WORKSPACE
            </div>
        </div>
    </footer>

</body>

</html>
