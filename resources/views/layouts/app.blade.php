<!DOCTYPE html>
<html lang="ja" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $title ?? '無重力 予定表 | Japanese Antigravity Void Todo' }}</title>
    
    <!-- Favicon: Floating Torii in Cosmic Void SVG -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='20' fill='%230b0d1a'/><circle cx='50' cy='50' r='35' fill='none' stroke='%2338bdf8' stroke-width='2' opacity='0.4'/><path d='M25 35 L75 35 M30 45 L70 45 M38 35 L38 75 M62 35 L62 75' stroke='%23e63946' stroke-width='4' stroke-linecap='round'/></svg>">

    <!-- Google Fonts: Noto Serif JP & Plus Jakarta Sans & Space Grotesk -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@300;400;600;700;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        void: {
                            950: '#070810',
                            900: '#0b0d1a',
                            850: '#101324',
                            800: '#16192e',
                            700: '#232847',
                        },
                        torii: {
                            crimson: '#e63946',
                            deep: '#bc3c30',
                            glow: '#ff4d5a',
                        },
                        soul: {
                            cyan: '#38bdf8',
                            glow: '#67e8f9',
                            teal: '#06b6d4',
                        },
                        sumi: {
                            white: '#f1f5f9',
                            silver: '#cbd5e1',
                            muted: '#94a3b8',
                            dark: '#0f172a',
                        },
                        washi: 'rgba(255, 255, 255, 0.07)',
                    },
                    fontFamily: {
                        serif: ['"Noto Serif JP"', 'serif'],
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        mono: ['"Space Grotesk"', 'monospace'],
                    },
                    boxShadow: {
                        'soul-glow': '0 0 25px -5px rgba(56, 189, 248, 0.4), 0 0 10px rgba(103, 232, 249, 0.25)',
                        'torii-glow': '0 0 25px -5px rgba(230, 57, 70, 0.5), 0 0 12px rgba(255, 77, 90, 0.3)',
                        'washi-card': '0 10px 30px -10px rgba(0, 0, 0, 0.6), inset 0 1px 1px rgba(255, 255, 255, 0.15)',
                        'washi-hover': '0 20px 45px -10px rgba(56, 189, 248, 0.35), inset 0 1px 2px rgba(255, 255, 255, 0.3)',
                    }
                }
            }
        }
    </script>

    <style>
        /* Base Cosmic Atmosphere & Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: #0b0d1a;
            color: #f1f5f9;
            overflow-x: hidden;
            min-height: 100vh;
        }

        ::selection {
            background: rgba(230, 57, 70, 0.7);
            color: #ffffff;
        }

        /* Upward Floating Drift Keyframes */
        @keyframes upwardFloat {
            0% {
                transform: translateY(105vh) rotate(0deg) translateX(0);
                opacity: 0;
            }
            15% { opacity: 0.8; }
            85% { opacity: 0.8; }
            100% {
                transform: translateY(-10vh) rotate(360deg) translateX(40px);
                opacity: 0;
            }
        }

        /* Weightless Bobbing Animations with Variable Timing */
        @keyframes floatBob1 {
            0% { transform: translateY(0px) rotate(-1deg); }
            50% { transform: translateY(-7px) rotate(0.5deg); }
            100% { transform: translateY(0px) rotate(-1deg); }
        }

        @keyframes floatBob2 {
            0% { transform: translateY(0px) rotate(1.2deg); }
            50% { transform: translateY(-9px) rotate(-0.3deg); }
            100% { transform: translateY(0px) rotate(1.2deg); }
        }

        @keyframes floatBob3 {
            0% { transform: translateY(0px) rotate(-0.6deg); }
            50% { transform: translateY(-6px) rotate(1.0deg); }
            100% { transform: translateY(0px) rotate(-0.6deg); }
        }

        @keyframes floatBob4 {
            0% { transform: translateY(0px) rotate(0.8deg); }
            50% { transform: translateY(-8px) rotate(-0.8deg); }
            100% { transform: translateY(0px) rotate(0.8deg); }
        }

        .float-organics-1 { animation: floatBob1 4.5s ease-in-out infinite; }
        .float-organics-2 { animation: floatBob2 5.8s ease-in-out 0.8s infinite; }
        .float-organics-3 { animation: floatBob3 6.2s ease-in-out 1.5s infinite; }
        .float-organics-4 { animation: floatBob4 5.2s ease-in-out 2.2s infinite; }

        /* Slow Pulse for Shinto Soul Flame / Torii Altar */
        @keyframes soulPulse {
            0%, 100% {
                box-shadow: 0 0 15px rgba(56, 189, 248, 0.25), inset 0 0 10px rgba(56, 189, 248, 0.1);
                border-color: rgba(56, 189, 248, 0.3);
            }
            50% {
                box-shadow: 0 0 30px rgba(56, 189, 248, 0.5), inset 0 0 15px rgba(56, 189, 248, 0.25);
                border-color: rgba(103, 232, 249, 0.6);
            }
        }

        .soul-aura {
            animation: soulPulse 4s ease-in-out infinite;
        }

        /* Authentic Hanko Stamp Effect (Completed Seal) */
        .hanko-seal {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #e63946;
            color: #e63946;
            padding: 2px 8px;
            font-family: 'Noto Serif JP', serif;
            font-weight: 900;
            letter-spacing: 0.18em;
            text-shadow: 0 0 8px rgba(230, 57, 70, 0.6);
            box-shadow: 0 0 12px rgba(230, 57, 70, 0.4), inset 0 0 6px rgba(230, 57, 70, 0.3);
            border-radius: 4px;
            background: rgba(230, 57, 70, 0.08);
            backdrop-filter: blur(4px);
            user-select: none;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            animation: stampIn 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        .hanko-seal::before {
            content: '';
            position: absolute;
            inset: 2px;
            border: 1px dashed rgba(230, 57, 70, 0.5);
            pointer-events: none;
        }

        @keyframes stampIn {
            0% {
                opacity: 0;
                transform: scale(2.2) rotate(-25deg);
                filter: blur(6px);
            }
            70% { transform: scale(0.92) rotate(6deg); }
            100% {
                opacity: 1;
                transform: scale(1) rotate(5deg);
                filter: blur(0);
            }
        }

        /* Completed Ascended Card Transition */
        .card-ascended {
            opacity: 0.58 !important;
            filter: contrast(0.95) saturate(0.85);
            border-color: rgba(230, 57, 70, 0.3) !important;
            background: rgba(22, 25, 46, 0.35) !important;
            box-shadow: 0 4px 20px -5px rgba(230, 57, 70, 0.15) !important;
        }

        .card-ascended:hover {
            opacity: 0.85 !important;
            transform: translateY(-4px) scale(1.01) !important;
        }

        /* Magnetic Hover Dynamic State */
        .magnetic-card {
            transition: transform 0.4s cubic-bezier(0.2, 0.8, 0.2, 1), 
                        box-shadow 0.4s cubic-bezier(0.2, 0.8, 0.2, 1),
                        border-color 0.4s cubic-bezier(0.2, 0.8, 0.2, 1),
                        background-color 0.4s ease,
                        opacity 0.4s ease;
        }

        .magnetic-card:hover {
            transform: translateY(-8px) scale(1.018) !important;
            z-index: 20;
            border-color: rgba(56, 189, 248, 0.55) !important;
            box-shadow: 0 20px 45px -10px rgba(56, 189, 248, 0.3), 
                        0 0 20px rgba(103, 232, 249, 0.2), 
                        inset 0 1px 2px rgba(255, 255, 255, 0.25) !important;
        }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #0b0d1a; }
        ::-webkit-scrollbar-thumb { background: rgba(56, 189, 248, 0.25); border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(56, 189, 248, 0.5); }
    </style>

    @livewireStyles
</head>
<body class="font-sans antialiased relative min-h-screen flex flex-col justify-between selection:bg-torii-crimson selection:text-white">

    <!-- Interactive Cosmic Canvas (Upward Floating Sakura & Zen Dust) -->
    <canvas id="voidCanvas" class="fixed inset-0 pointer-events-none z-0"></canvas>

    <!-- Celestial Nebula Ambient Glows -->
    <div class="fixed inset-0 pointer-events-none -z-10 overflow-hidden">
        <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[750px] h-[750px] bg-gradient-to-b from-indigo-700/20 via-purple-900/15 to-transparent rounded-full blur-[140px]"></div>
        <div class="absolute -bottom-24 -left-20 w-[550px] h-[550px] bg-soul-cyan/15 rounded-full blur-[130px]"></div>
        <div class="absolute top-1/4 -right-24 w-[500px] h-[500px] bg-torii-crimson/15 rounded-full blur-[120px]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(#38bdf8_1px,transparent_1px)] [background-size:40px_40px] opacity-[0.06]"></div>
    </div>

    <!-- Main Livewire Slot or Blade Content -->
    {{ $slot ?? $__env->yieldContent('content') }}

    <!-- Footer Shinto Zen Quote -->
    <footer class="relative z-10 w-full py-8 text-center text-xs font-serif text-sumi-muted/70 border-t border-white/5 mt-12 bg-void-950/40 backdrop-blur-sm">
        <div class="max-w-md mx-auto px-4 space-y-2">
            <div class="flex items-center justify-center gap-3 text-torii-crimson/60">
                <span>✦</span>
                <span class="tracking-[0.3em] uppercase text-sumi-silver/80">心頭滅却すれば火も自ずから涼し</span>
                <span>✦</span>
            </div>
            <p class="text-[11px] text-sumi-muted">
                Kendalikan pikiran, maka gravitasi dan kekacauan dunia akan sirna.
            </p>
            <div class="pt-2 font-mono text-[10px] text-sumi-muted/50 tracking-wider">
                LARAVEL 13 & LIVEWIRE // JAPANESE ANTIGRAVITY VOID EDITION
            </div>
        </div>
    </footer>

    @livewireScripts

    <!-- Canvas Particle Simulation & Web Audio API Engine -->
    <script>
        // -------------------------------------------------------------
        // 1. SYNTHESIZED WEB AUDIO API (ZEN SINGING BOWL & HARP CHIMES)
        // -------------------------------------------------------------
        let audioCtx = null;
        let soundEnabled = localStorage.getItem('japanese_antigravity_sound_enabled') !== 'false';

        function getAudioContext() {
            if (!audioCtx) {
                const AudioContext = window.AudioContext || window.webkitAudioContext;
                if (AudioContext) {
                    audioCtx = new AudioContext();
                }
            }
            if (audioCtx && audioCtx.state === 'suspended') {
                audioCtx.resume();
            }
            return audioCtx;
        }

        function playSound(type) {
            if (!soundEnabled) return;
            try {
                const ctx = getAudioContext();
                if (!ctx) return;
                const now = ctx.currentTime;

                if (type === 'complete') {
                    // Tibetan Singing Bowl Harmonic Chime (432Hz fundamental + harmonic overtone)
                    const osc1 = ctx.createOscillator();
                    const osc2 = ctx.createOscillator();
                    const gainNode = ctx.createGain();

                    osc1.type = 'sine';
                    osc1.frequency.setValueAtTime(432, now);
                    osc1.frequency.exponentialRampToValueAtTime(430, now + 1.8);

                    osc2.type = 'sine';
                    osc2.frequency.setValueAtTime(864, now);
                    osc2.frequency.exponentialRampToValueAtTime(860, now + 1.2);

                    gainNode.gain.setValueAtTime(0.01, now);
                    gainNode.gain.linearRampToValueAtTime(0.28, now + 0.04);
                    gainNode.gain.exponentialRampToValueAtTime(0.0001, now + 1.9);

                    osc1.connect(gainNode);
                    osc2.connect(gainNode);
                    gainNode.connect(ctx.destination);

                    osc1.start(now);
                    osc2.start(now);
                    osc1.stop(now + 2.0);
                    osc2.stop(now + 2.0);

                } else if (type === 'add') {
                    // Crystalline Harp Chime (Upward ascending celestial interval)
                    const freqs = [523.25, 659.25, 783.99, 1046.50];
                    freqs.forEach((freq, idx) => {
                        const osc = ctx.createOscillator();
                        const gain = ctx.createGain();
                        const noteTime = now + (idx * 0.07);

                        osc.type = 'sine';
                        osc.frequency.setValueAtTime(freq, noteTime);

                        gain.gain.setValueAtTime(0.01, noteTime);
                        gain.gain.linearRampToValueAtTime(0.18, noteTime + 0.02);
                        gain.gain.exponentialRampToValueAtTime(0.0001, noteTime + 0.6);

                        osc.connect(gain);
                        gain.connect(ctx.destination);

                        osc.start(noteTime);
                        osc.stop(noteTime + 0.65);
                    });

                } else if (type === 'delete') {
                    // Ethereal void dispersion swoosh
                    const osc = ctx.createOscillator();
                    const gain = ctx.createGain();

                    osc.type = 'triangle';
                    osc.frequency.setValueAtTime(320, now);
                    osc.frequency.exponentialRampToValueAtTime(80, now + 0.35);

                    gain.gain.setValueAtTime(0.15, now);
                    gain.gain.exponentialRampToValueAtTime(0.001, now + 0.35);

                    osc.connect(gain);
                    gain.connect(ctx.destination);

                    osc.start(now);
                    osc.stop(now + 0.36);
                }
            } catch (err) {}
        }

        // Listen for Livewire dispatched events
        window.addEventListener('todo-sound', (e) => {
            const type = e.detail?.type || 'add';
            playSound(type);
        });

        window.addEventListener('stardust-burst', (e) => {
            const taskId = e.detail?.id;
            const el = document.getElementById('task-card-' + taskId);
            if (!el) return;
            const rect = el.getBoundingClientRect();
            for (let i = 0; i < 14; i++) {
                spawnFloatingMote(rect.left + rect.width * 0.8, rect.top + rect.height * 0.5);
            }
        });

        function spawnFloatingMote(x, y) {
            const mote = document.createElement('div');
            mote.className = 'fixed pointer-events-none rounded-full z-50';
            const size = Math.random() * 5 + 3;
            mote.style.width = size + 'px';
            mote.style.height = size + 'px';
            mote.style.backgroundColor = Math.random() > 0.5 ? '#e63946' : '#38bdf8';
            mote.style.boxShadow = `0 0 10px ${mote.style.backgroundColor}`;
            mote.style.left = x + 'px';
            mote.style.top = y + 'px';

            document.body.appendChild(mote);

            const destX = (Math.random() - 0.5) * 120;
            const destY = -Math.random() * 80 - 20;

            mote.animate([
                { transform: 'translate(0, 0) scale(1)', opacity: 1 },
                { transform: `translate(${destX}px, ${destY}px) scale(0)`, opacity: 0 }
            ], {
                duration: 600 + Math.random() * 400,
                easing: 'cubic-bezier(0, 0, 0.2, 1)'
            }).onfinish = () => {
                mote.remove();
            };
        }

        window.toggleSoundMaster = function() {
            soundEnabled = !soundEnabled;
            localStorage.setItem('japanese_antigravity_sound_enabled', soundEnabled);
            const label = document.getElementById('soundLabelMaster');
            const icon = document.getElementById('soundIconMaster');
            if (label && icon) {
                label.textContent = soundEnabled ? '音響: ON' : '音響: OFF';
                icon.textContent = soundEnabled ? '🔔' : '🔕';
            }
            if (soundEnabled) playSound('add');
        };

        // -------------------------------------------------------------
        // 2. UPWARD FLOATING DRIFT CANVAS (SAKURA PETALS & ZEN STARDUST)
        // -------------------------------------------------------------
        const canvas = document.getElementById('voidCanvas');
        const ctx = canvas.getContext('2d');
        let width = 0, height = 0;
        let particles = [];
        const PARTICLE_COUNT = 45;

        function resizeCanvas() {
            width = canvas.width = window.innerWidth;
            height = canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        class ZeroGravityParticle {
            constructor() {
                this.reset(true);
            }

            reset(initial = false) {
                this.x = Math.random() * width;
                this.y = initial ? Math.random() * height : height + 20;
                this.type = Math.random() > 0.45 ? 'sakura' : 'stardust';

                if (this.type === 'sakura') {
                    this.size = Math.random() * 7 + 6;
                    this.vy = -(Math.random() * 0.7 + 0.35);
                    this.vx = (Math.random() - 0.5) * 0.5;
                    this.swaySpeed = Math.random() * 0.02 + 0.01;
                    this.swayOffset = Math.random() * Math.PI * 2;
                    this.rotation = Math.random() * Math.PI * 2;
                    this.rotationSpeed = (Math.random() - 0.5) * 0.02;
                    this.opacity = Math.random() * 0.45 + 0.25;
                    this.color = Math.random() > 0.25 ? 'rgba(244, 114, 182,' : 'rgba(103, 232, 249,';
                } else {
                    this.size = Math.random() * 2.2 + 0.8;
                    this.vy = -(Math.random() * 0.5 + 0.2);
                    this.vx = (Math.random() - 0.5) * 0.3;
                    this.swaySpeed = Math.random() * 0.03 + 0.015;
                    this.swayOffset = Math.random() * Math.PI * 2;
                    this.opacity = Math.random() * 0.6 + 0.2;
                    this.color = Math.random() > 0.5 ? 'rgba(56, 189, 248,' : 'rgba(230, 57, 70,';
                }
            }

            update(time) {
                this.y += this.vy;
                this.x += Math.sin(time * this.swaySpeed + this.swayOffset) * 0.7 + this.vx;

                if (this.type === 'sakura') {
                    this.rotation += this.rotationSpeed;
                }

                if (this.y < -30 || this.x < -40 || this.x > width + 40) {
                    this.reset(false);
                }
            }

            draw(ctx) {
                ctx.save();
                ctx.translate(this.x, this.y);

                if (this.type === 'sakura') {
                    ctx.rotate(this.rotation);
                    ctx.fillStyle = `${this.color}${this.opacity})`;
                    ctx.beginPath();
                    ctx.moveTo(0, -this.size);
                    ctx.quadraticCurveTo(this.size * 0.8, -this.size * 0.5, this.size * 0.6, this.size * 0.5);
                    ctx.quadraticCurveTo(0, this.size, -this.size * 0.6, this.size * 0.5);
                    ctx.quadraticCurveTo(-this.size * 0.8, -this.size * 0.5, 0, -this.size);
                    ctx.closePath();
                    ctx.fill();
                } else {
                    ctx.fillStyle = `${this.color}${this.opacity})`;
                    ctx.shadowBlur = 8;
                    ctx.shadowColor = this.color.replace('rgba', 'rgb').slice(0, -1) + ')';
                    ctx.beginPath();
                    ctx.arc(0, 0, this.size, 0, Math.PI * 2);
                    ctx.fill();
                }

                ctx.restore();
            }
        }

        for (let i = 0; i < PARTICLE_COUNT; i++) {
            particles.push(new ZeroGravityParticle());
        }

        function animateCanvas(time) {
            ctx.clearRect(0, 0, width, height);
            const t = time * 0.001;
            for (let i = 0; i < particles.length; i++) {
                particles[i].update(t);
                particles[i].draw(ctx);
            }
            requestAnimationFrame(animateCanvas);
        }
        requestAnimationFrame(animateCanvas);
    </script>
</body>
</html>
