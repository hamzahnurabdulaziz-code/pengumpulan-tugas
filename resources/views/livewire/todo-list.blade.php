<div>
    <!-- ============================================================== -->
    <!-- TOP TELEMETRY HUD BAR                                          -->
    <!-- ============================================================== -->
    <header class="relative z-10 w-full max-w-5xl mx-auto px-4 sm:px-6 pt-6 pb-2">
        <div class="flex items-center justify-between gap-4 py-2 px-4 rounded-full bg-void-900/60 border border-white/10 backdrop-blur-md shadow-lg text-xs">
            <!-- Left: Zero-G Status & Telemetry -->
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-2 px-2.5 py-1 rounded-full bg-soul-cyan/10 border border-soul-cyan/30 text-soul-glow">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-soul-cyan opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-soul-cyan"></span>
                    </span>
                    <span class="font-mono tracking-wider font-semibold">重力遮断 0.00 G</span>
                </div>
                <div class="hidden md:flex items-center gap-1.5 text-sumi-muted font-mono tracking-widest text-[11px]">
                    <span class="text-torii-crimson font-serif">⛩</span>
                    <span>虚空神殿 // CELESTIAL SANCTUARY</span>
                </div>
            </div>

            <!-- Right: Controls (Sound, Task Stats, Network Status) -->
            <div class="flex items-center gap-3">
                <!-- Sound Toggle Button -->
                <button 
                    type="button"
                    onclick="window.toggleSoundMaster()" 
                    title="Efek Suara Kosmik (Zen Singing Bowl)"
                    class="flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/5 hover:bg-white/10 text-sumi-silver hover:text-white border border-white/10 transition-colors cursor-pointer"
                >
                    <span id="soundIconMaster" class="text-sm">🔔</span>
                    <span id="soundLabelMaster" class="hidden sm:inline font-mono text-[11px]">音響: ON</span>
                </button>

                <!-- Livewire Syncing Indicator -->
                <div wire:loading class="text-[10px] font-mono text-soul-cyan animate-pulse">
                    <span>交信中... (SYNC)</span>
                </div>

                <!-- Orbit Progress Counter -->
                <div class="flex items-center gap-1.5 px-3 py-1 rounded-full bg-void-850/80 border border-white/10 font-mono text-[11px] text-sumi-silver">
                    <span class="text-soul-cyan">浮遊中:</span>
                    <span class="font-bold text-white">{{ $activeCount }}</span>
                    <span class="text-sumi-muted">/</span>
                    <span class="text-torii-glow">昇天:</span>
                    <span class="font-bold text-white">{{ $completedCount }}</span>
                </div>
            </div>
        </div>
    </header>

    <!-- ============================================================== -->
    <!-- MAIN CONTENT CONTAINER                                         -->
    <!-- ============================================================== -->
    <main class="relative z-10 w-full max-w-3xl mx-auto px-4 sm:px-6 py-6 flex-1 flex flex-col">

        <!-- ========================================== -->
        <!-- SHRINE HERO BRANDING & LOGO               -->
        <!-- ========================================== -->
        <section class="text-center mb-8 relative">
            <!-- Floating Japanese Watermark / Seal in Background -->
            <div class="absolute left-1/2 -top-6 -translate-x-1/2 text-8xl sm:text-9xl font-serif font-black text-white/[0.025] select-none pointer-events-none tracking-widest whitespace-nowrap">
                無重力空間
            </div>

            <!-- Subtitle Kicker with Shinto Knot Accent -->
            <div class="inline-flex items-center gap-3 mb-3">
                <span class="h-[1px] w-8 sm:w-16 bg-gradient-to-r from-transparent via-soul-cyan/60 to-transparent"></span>
                <span class="text-[11px] sm:text-xs font-serif uppercase tracking-[0.35em] text-soul-glow drop-shadow-[0_0_8px_rgba(56,189,248,0.5)]">
                    天界浮遊の聖域 • CELESTIAL FLOATING SANCTUARY
                </span>
                <span class="h-[1px] w-8 sm:w-16 bg-gradient-to-l from-transparent via-soul-cyan/60 to-transparent"></span>
            </div>

            <!-- Main Title: 「無重力 予定表」 -->
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-serif font-black tracking-wider text-sumi-white flex items-center justify-center gap-3 drop-shadow-[0_0_20px_rgba(241,245,249,0.3)]">
                <span class="text-torii-crimson select-none drop-shadow-[0_0_15px_rgba(230,57,70,0.6)]">⛩</span>
                <span class="bg-gradient-to-b from-white via-slate-100 to-slate-300 bg-clip-text text-transparent">
                    無重力 予定表
                </span>
            </h1>

            <!-- Descriptive Subtitle in Indonesian & Japanese -->
            <p class="mt-2.5 text-xs sm:text-sm font-serif text-sumi-silver/80 tracking-wide max-w-md mx-auto">
                Lepaskan beban tugas dari gravitasi duniawi. <br class="sm:hidden">
                <span class="text-soul-glow/90 italic">Biarkan fokusmu melayang bebas di ruang hening kosmik.</span>
            </p>

            <!-- Celestial Coordinates HUD Indicator -->
            <div class="mt-3 flex items-center justify-center gap-4 text-[10px] font-mono text-sumi-muted tracking-widest">
                <span>LARAVEL 13 & LIVEWIRE</span>
                <span>•</span>
                <span class="text-soul-cyan">GRAVITY: 0.00 G</span>
                <span>•</span>
                <span>VOID_STATE: HARMONY</span>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- ALTAR INPUT (TUGAS BARU / 奉納)            -->
        <!-- ========================================== -->
        <section class="mb-8">
            <div class="relative p-[1px] rounded-2xl bg-gradient-to-b from-soul-cyan/40 via-white/10 to-torii-crimson/30 shadow-washi-card">
                <form wire:submit="add" class="rounded-[15px] bg-void-900/80 backdrop-blur-xl p-4 sm:p-5 border border-white/10">
                    
                    <div class="flex flex-col sm:flex-row items-stretch gap-3">
                        <!-- Task Text Input -->
                        <div class="relative flex-1">
                            <input 
                                type="text" 
                                wire:model="title"
                                placeholder="新しい任務を入力... (Tulis tugas barumu di sini...)" 
                                autocomplete="off"
                                class="w-full bg-void-950/60 border border-white/15 focus:border-soul-cyan rounded-xl px-4 py-3 text-sm text-sumi-white placeholder-sumi-muted/60 focus:outline-none focus:ring-2 focus:ring-soul-cyan/30 transition-all font-sans"
                            >
                            <div class="absolute bottom-0 left-3 right-3 h-[1px] bg-gradient-to-r from-transparent via-soul-cyan/40 to-transparent pointer-events-none"></div>
                            @error('title')
                                <span class="text-[11px] font-serif text-torii-glow mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tag Selection (Dropdown/Preset) -->
                        <div class="relative sm:w-44">
                            <select 
                                wire:model="tag"
                                class="w-full h-full bg-void-950/60 border border-white/15 focus:border-soul-cyan rounded-xl px-3 py-3 text-xs text-sumi-silver focus:outline-none focus:ring-2 focus:ring-soul-cyan/30 transition-all font-serif cursor-pointer appearance-none"
                            >
                                <option value="日常" class="bg-void-900 text-sumi-white">日常 (Harian)</option>
                                <option value="修行" class="bg-void-900 text-sumi-white">修行 (Fokus/Coding)</option>
                                <option value="精神" class="bg-void-900 text-sumi-white">精神 (Meditasi/Santai)</option>
                                <option value="極秘" class="bg-void-900 text-sumi-white">極秘 (Prioritas Tinggi)</option>
                                <option value="読書" class="bg-void-900 text-sumi-white">読書 (Belajar/Baca)</option>
                            </select>
                            <div class="absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none text-xs text-sumi-muted">
                                ▾
                            </div>
                        </div>

                        <!-- Add Button (Kanji: 追加) with Torii Crimson Gradient -->
                        <button 
                            type="submit" 
                            wire:loading.attr="disabled"
                            class="relative group overflow-hidden px-6 py-3 rounded-xl bg-gradient-to-r from-torii-crimson via-torii-deep to-torii-crimson bg-[length:200%_auto] hover:bg-right transition-all duration-300 text-white font-serif font-bold text-sm tracking-widest shadow-torii-glow hover:scale-[1.03] active:scale-[0.98] flex items-center justify-center gap-2.5 flex-shrink-0 cursor-pointer disabled:opacity-50"
                        >
                            <span class="relative z-10 flex items-center gap-2">
                                <span class="text-base font-sans font-light leading-none">+</span>
                                <span>追加</span>
                                <span class="text-[10px] font-sans font-normal opacity-75 uppercase tracking-normal">(Tambah)</span>
                            </span>
                            <div class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-700 bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>
                        </button>
                    </div>

                    <!-- Filter Quick Tags Preset & Search Bar -->
                    <div class="mt-4 pt-3 border-t border-white/5 flex flex-wrap items-center justify-between gap-3 text-xs">
                        <div class="flex items-center gap-2 flex-wrap">
                            <span class="text-sumi-muted text-[11px] font-serif">Tag Cepat:</span>
                            <button type="button" wire:click="setTag('日常')" class="px-2 py-0.5 rounded-md bg-white/5 hover:bg-white/10 text-sumi-silver border border-white/10 text-[10px] transition-colors cursor-pointer {{ $tag === '日常' ? 'ring-1 ring-soul-cyan' : '' }}">#日常</button>
                            <button type="button" wire:click="setTag('修行')" class="px-2 py-0.5 rounded-md bg-white/5 hover:bg-white/10 text-soul-cyan border border-soul-cyan/20 text-[10px] transition-colors cursor-pointer {{ $tag === '修行' ? 'ring-1 ring-soul-cyan' : '' }}">#修行</button>
                            <button type="button" wire:click="setTag('精神')" class="px-2 py-0.5 rounded-md bg-white/5 hover:bg-white/10 text-purple-300 border border-purple-500/20 text-[10px] transition-colors cursor-pointer {{ $tag === '精神' ? 'ring-1 ring-soul-cyan' : '' }}">#精神</button>
                            <button type="button" wire:click="setTag('極秘')" class="px-2 py-0.5 rounded-md bg-white/5 hover:bg-white/10 text-torii-glow border border-torii-crimson/20 text-[10px] transition-colors cursor-pointer {{ $tag === '極秘' ? 'ring-1 ring-soul-cyan' : '' }}">#極秘</button>
                        </div>

                        <!-- Live Filter Tab Buttons -->
                        <div class="flex items-center gap-1 bg-void-950/80 p-1 rounded-lg border border-white/10">
                            <button 
                                type="button" 
                                wire:click="setFilter('all')" 
                                class="px-2.5 py-0.5 rounded text-[11px] font-serif transition-all cursor-pointer {{ $filter === 'all' ? 'bg-soul-cyan/20 text-soul-glow border border-soul-cyan/40' : 'text-sumi-muted hover:text-white' }}"
                            >
                                全て ({{ $totalCount }})
                            </button>
                            <button 
                                type="button" 
                                wire:click="setFilter('active')" 
                                class="px-2.5 py-0.5 rounded text-[11px] font-serif transition-all cursor-pointer {{ $filter === 'active' ? 'bg-soul-cyan/20 text-soul-glow border border-soul-cyan/40' : 'text-sumi-muted hover:text-white' }}"
                            >
                                浮遊 ({{ $activeCount }})
                            </button>
                            <button 
                                type="button" 
                                wire:click="setFilter('completed')" 
                                class="px-2.5 py-0.5 rounded text-[11px] font-serif transition-all cursor-pointer {{ $filter === 'completed' ? 'bg-soul-cyan/20 text-soul-glow border border-soul-cyan/40' : 'text-sumi-muted hover:text-white' }}"
                            >
                                昇天 ({{ $completedCount }})
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- TODO LIST CARDS (WEIGHTLESS BOBBING)        -->
        <!-- ========================================== -->
        <section class="space-y-4 relative min-h-[240px]">
            @php
                $tiltList = ['-1.1deg', '0.9deg', '-0.6deg', '1.3deg', '-0.3deg', '0.7deg'];
                $animList = ['float-organics-1', 'float-organics-2', 'float-organics-3', 'float-organics-4'];
            @endphp

            @forelse ($todos as $todo)
                @php
                    $isCompleted = $todo->is_completed;
                    $tilt = $tiltList[$todo->id % count($tiltList)];
                    $animClass = $animList[$todo->id % count($animList)];
                    $tag = $todo->description ?: '日常';

                    $tagColorClass = 'text-sumi-silver border-white/10 bg-white/5';
                    if ($tag === '修行') $tagColorClass = 'text-soul-cyan border-soul-cyan/30 bg-soul-cyan/10';
                    elseif ($tag === '精神') $tagColorClass = 'text-purple-300 border-purple-500/30 bg-purple-500/10';
                    elseif ($tag === '極秘') $tagColorClass = 'text-torii-glow border-torii-crimson/30 bg-torii-crimson/10';
                    elseif ($tag === '読書') $tagColorClass = 'text-emerald-300 border-emerald-500/30 bg-emerald-500/10';
                @endphp

                <div 
                    wire:key="todo-item-{{ $todo->id }}"
                    id="task-card-{{ $todo->id }}"
                    style="transform: rotate({{ $tilt }});"
                    class="magnetic-card {{ $animClass }} relative group rounded-2xl p-4 sm:p-5 border transition-all duration-300 backdrop-blur-md
                        {{ $isCompleted 
                            ? 'card-ascended' 
                            : 'bg-void-900/65 border-white/10 hover:border-soul-cyan/50 shadow-washi-card'
                        }}"
                >
                    <div class="flex items-start sm:items-center justify-between gap-3.5">
                        
                        <!-- Left: Soul Checkbox Toggle -->
                        <button 
                            type="button"
                            wire:click="toggle({{ $todo->id }})"
                            title="{{ $isCompleted ? 'Batalkan Status Selesai' : 'Tandai Selesai (完了)' }}"
                            class="mt-0.5 sm:mt-0 flex-shrink-0 w-6 h-6 rounded-lg flex items-center justify-center transition-all duration-300 cursor-pointer
                                {{ $isCompleted 
                                    ? 'bg-torii-crimson text-white shadow-torii-glow scale-105' 
                                    : 'bg-void-950/80 border border-white/20 hover:border-soul-cyan hover:shadow-soul-glow text-transparent hover:text-soul-cyan/50'
                                }}"
                        >
                            <svg class="w-3.5 h-3.5 stroke-[3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </button>

                        <!-- Center: Task Description & Metadata -->
                        <div class="flex-1 min-w-0 pr-2">
                            <div class="flex items-center gap-2 flex-wrap mb-1">
                                <!-- Tag Badge -->
                                <span class="px-2 py-0.5 rounded text-[10px] font-serif border tracking-wider {{ $tagColorClass }}">
                                    #{{ $tag }}
                                </span>

                                <!-- Launch Time -->
                                <span class="text-[10px] font-mono text-sumi-muted/70 tracking-widest">
                                    投入: {{ $todo->created_at ? $todo->created_at->format('h:i A') : '08:00 AM' }}
                                </span>
                            </div>

                            <!-- Task Title -->
                            <p class="text-sm sm:text-base font-sans transition-all duration-300 break-words leading-relaxed
                                {{ $isCompleted 
                                    ? 'line-through text-sumi-muted/60 italic font-serif' 
                                    : 'text-sumi-white font-medium drop-shadow-sm'
                                }}"
                            >
                                {{ $todo->title }}
                            </p>
                        </div>

                        <!-- Right: Hanko Seal or Delete Kanji Button -->
                        <div class="flex items-center gap-2 flex-shrink-0 self-center">
                            @if ($isCompleted)
                                <!-- Glowing Red Hanko Stamp (完了) -->
                                <div class="hanko-seal text-xs sm:text-sm">
                                    完了
                                </div>
                            @endif

                            <!-- Delete Button (Kanji: 消去 / 解除) -->
                            <button 
                                type="button"
                                wire:click="delete({{ $todo->id }})"
                                title="Lepaskan tugas ke kosmik (Hapus)"
                                class="opacity-40 group-hover:opacity-100 hover:text-torii-glow px-2 py-1 rounded text-xs font-serif transition-all hover:bg-torii-crimson/10 border border-transparent hover:border-torii-crimson/30 flex items-center gap-1 cursor-pointer"
                            >
                                <span class="text-[10px] font-mono tracking-tighter sm:inline hidden">RELEASE //</span>
                                <span>消去</span>
                            </button>
                        </div>

                    </div>
                </div>
            @empty
                <div class="py-16 px-6 text-center rounded-2xl bg-void-900/40 border border-white/5 backdrop-blur-md">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-soul-cyan/10 border border-soul-cyan/20 text-soul-glow text-3xl mb-3 shadow-[0_0_20px_rgba(56,189,248,0.2)]">
                        ⛩
                    </div>
                    <h3 class="text-base font-serif font-bold text-sumi-white tracking-wider mb-1">
                        @if ($filter === 'active')
                            Tidak ada tugas yang sedang melayang.
                        @elseif ($filter === 'completed')
                            Belum ada tugas yang diselesaikan.
                        @else
                            Semua tugas telah melayang terselesaikan.
                        @endif
                    </h3>
                    <p class="text-xs font-serif text-sumi-muted max-w-sm mx-auto">
                        @if ($filter === 'active')
                            Semua misi telah tercapai dan naik ke nirwana.
                        @elseif ($filter === 'completed')
                            Centang salah satu tugas untuk menyematkan stempel hanko 完了.
                        @else
                            Kosmik dalam keadaan tenang & seimbang. Tambahkan tugas baru untuk memulai.
                        @endif
                    </p>
                    @if ($totalCount === 0)
                        <button 
                            type="button"
                            wire:click="resetSampleTasks" 
                            class="mt-4 px-4 py-2 rounded-xl bg-white/5 hover:bg-white/10 text-soul-cyan border border-soul-cyan/30 text-xs font-serif tracking-wider transition-all cursor-pointer"
                        >
                            ✦ Muat Contoh Tugas Kosmik (Sample) ✦
                        </button>
                    @endif
                </div>
            @endforelse
        </section>

        <!-- Clear Completed / Reset Altar Buttons -->
        @if ($totalCount > 0)
            <div class="mt-8 flex items-center justify-between text-xs font-serif text-sumi-muted px-2">
                <button 
                    type="button"
                    wire:click="clearCompleted" 
                    class="hover:text-torii-glow transition-colors flex items-center gap-1.5 opacity-75 hover:opacity-100 cursor-pointer"
                >
                    <span>⛩</span>
                    <span>昇天した任務を清める (Hapus Semua Selesai)</span>
                </button>

                <button 
                    type="button"
                    wire:click="resetSampleTasks" 
                    class="hover:text-soul-glow transition-colors flex items-center gap-1.5 opacity-60 hover:opacity-100 text-[11px] cursor-pointer"
                >
                    <span>↺</span>
                    <span>Muat Contoh Tugas Asli</span>
                </button>
            </div>
        @endif

    </main>
</div>
