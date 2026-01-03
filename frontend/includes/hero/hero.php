<!-- Hero Section - God Tier (ULTIMATE) -->
<link rel="stylesheet" href="includes/hero/hero.css">
<section id="hero"
    class="relative min-h-screen flex items-center justify-center overflow-hidden bg-white dark:bg-[#020617] text-slate-900 dark:text-white transition-colors duration-1000">

    <!-- Layer 0: Global FX -->
    <div class="mouse-glow"></div>
    <div class="hero-grid pointer-events-none"></div>
    <div class="cyber-noise"></div>

    <!-- HUD Brackets -->
    <div class="hud-corner hud-tl"></div>
    <div class="hud-corner hud-tr"></div>
    <div class="hud-corner hud-bl"></div>
    <div class="hud-corner hud-br"></div>

    <!-- Layer 1: Particles (Rising Tech Bubbles) -->
    <div id="tsparticles" class="absolute inset-0 z-0 opacity-60 dark:opacity-40"></div>

    <!-- Layer 2: 3D Floating Hardware Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none z-10">
        <!-- CPU Floating -->
        <div class="tech-float absolute top-[15%] left-[5%] opacity-20 dark:opacity-40 scale-75 lg:scale-100">
            <svg width="200" height="200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0.5"
                class="text-primary">
                <rect x="4" y="4" width="16" height="16" rx="2" />
                <path d="M9 9h6v6H9zM9 1v3M15 1v3M9 20v3M15 20v3M20 9h3M20 15h3M1 9h3M1 15h3" />
            </svg>
        </div>
        <!-- GPU Architecture -->
        <div class="tech-float absolute bottom-[10%] right-[5%] opacity-20 dark:opacity-40 scale-75 lg:scale-100"
            style="animation-delay: -5s">
            <svg width="250" height="250" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0.5"
                class="text-secondary">
                <rect x="2" y="6" width="20" height="12" rx="2" />
                <circle cx="8" cy="12" r="3" />
                <circle cx="16" cy="12" r="3" />
                <path d="M2 10h20M2 14h20" />
            </svg>
        </div>
    </div>

    <!-- Layer 3: Main Content (Neural Parallax) -->
    <div class="parallax-container container relative z-20 text-center px-6">
        <div data-aos="zoom-out" data-aos-duration="2500" class="flex flex-col items-center">

            <!-- Core Identifier Badge -->
            <div
                class="inline-flex items-center gap-4 px-6 md:px-10 py-2 md:py-3 mb-4 md:mb-8 mt-4 md:mt-6 rounded-full bg-white/5 dark:bg-slate-800/10 border border-primary/20 backdrop-blur-3xl group cursor-help transition-all">
                <div class="relative flex items-center justify-center">
                    <div class="absolute inset-0 bg-primary/20 blur-md rounded-full animate-pulse"></div>
                    <div class="w-2 h-2 rounded-full bg-primary relative z-10"></div>
                </div>
                <span
                    class="text-[10px] font-black tracking-[0.6em] uppercase text-slate-500 dark:text-slate-400 group-hover:text-primary transition-colors"
                    data-i18n="hero_badge">
                    Neural Tech Interface 4.0
                </span>
            </div>

            <!-- God Tier Typography -->
            <h1 class="text-giant font-black mb-4 md:mb-8 tracking-tightest char-bounce cursor-default px-4">
                <span class="glitch-text text-gradient-animate inline-block" data-text="قوة"
                    data-i18n="hero_title_1">قوة</span>
                <br>
                <span class="relative inline-block hover:scale-[1.05] transition-all duration-700"
                    data-i18n="hero_title_2">
                    تتجاوز الحدود
                    <div
                        class="absolute -bottom-4 md:-bottom-6 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-primary to-transparent opacity-100">
                    </div>
                </span>
            </h1>

            <!-- Immersive Description -->
            <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-lg md:text-xl lg:text-2xl max-w-4xl mx-auto mb-6 md:mb-12 leading-relaxed font-light px-6"
                data-i18n="hero_description">
                نحن لا نقدم عتاداً فحسب، بل نبني <span class="text-slate-950 dark:text-white font-black">البيئة
                    الحيوية</span> التي يتنفس فيها إبداعك.
                اكتشف الذروة المطلقة في <span class="text-primary font-bold">الأداء الرقمي</span>.
            </p>

            <!-- Magnetic CTA System -->
            <div class="flex flex-col md:flex-row gap-4 md:gap-8 justify-center items-center mb-6 md:mb-16 w-full px-6">
                <div class="magnetic-wrapper w-full md:w-auto">
                    <a href="products.php"
                        class="magnetic-btn inline-flex justify-center group relative w-full md:w-auto px-8 md:px-12 py-4 md:py-6 bg-primary text-white overflow-hidden rounded-2xl md:rounded-[2.5rem] transition-all duration-300">
                        <span class="relative z-10 font-bold text-lg md:text-xl flex items-center gap-4 md:gap-6">
                            <span data-i18n="hero_cta_primary">التحول الرقمي</span>
                            <svg class="w-5 h-5 md:w-6 md:h-6 group-hover:translate-x-[-15px] transition-transform duration-700"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                            </svg>
                        </span>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-primary via-white/20 to-primary opacity-100 bg-[length:200%_auto] hover:bg-[100%_0] transition-all duration-700">
                        </div>
                    </a>
                </div>

                <div class="magnetic-wrapper w-full md:w-auto">
                    <a href="#featured"
                        class="magnetic-btn inline-flex justify-center group w-full md:w-auto px-8 md:px-12 py-4 md:py-6 bg-transparent text-slate-800 dark:text-white font-black text-lg md:text-xl rounded-2xl md:rounded-[2.5rem] border-2 border-slate-200 dark:border-slate-800 hover:border-primary transition-all duration-700 backdrop-blur-3xl hover:bg-primary/5">
                        <span data-i18n="hero_cta_secondary">الكتالوج الفخم</span>
                    </a>
                </div>
            </div>

            <!-- Ultimate Progress Indicator -->
            <div class="flex flex-col items-center gap-4 md:gap-6 group scale-100 md:scale-125">
                <div class="w-[2px] h-24 bg-slate-200 dark:bg-slate-800 relative overflow-hidden rounded-full">
                    <div class="absolute top-0 left-0 w-full h-1/2 bg-primary animate-scroll-fast"></div>
                </div>
                <span class="text-[9px] font-black uppercase tracking-[0.8em] text-slate-400 dark:text-slate-600"
                    data-i18n="hero_scroll">Explore
                    Existence</span>
            </div>
        </div>
    </div>
</section>

<script>
    // 1. Theme-Aware Falling/Rising Bubbles Engine
    async function initBubbleEngine() {
        if (typeof tsParticles === 'undefined') return;

        const isDark = document.documentElement.classList.contains('dark');
        const color = isDark ? "#ef4444" : "#3b82f6";

        await tsParticles.load("tsparticles", {
            fullScreen: { enable: false },
            particles: {
                color: { value: [color, "#ffffff"] },
                shape: { type: "circle" },
                opacity: {
                    value: { min: 0.1, max: 0.5 },
                    animation: { enable: true, speed: 1, sync: false }
                },
                size: {
                    value: { min: 2, max: 8 },
                    animation: { enable: true, speed: 2, sync: false }
                },
                move: {
                    enable: true,
                    speed: 2,
                    direction: "top", // RISING bubbles
                    random: true,
                    straight: false,
                    outModes: { default: "out" },
                },
                number: { value: 60, density: { enable: true, area: 800 } },
            },
            interactivity: {
                events: {
                    onHover: { enable: false, mode: "bubble" },
                    onClick: { enable: true, mode: "push" },
                    resize: true
                },
                modes: {
                    bubble: { distance: 200, size: 12, duration: 2, opacity: 0.8 },
                    push: { quantity: 4 }
                }
            },
            detectRetina: true
        });
    }

    // 2. Interactive 3D & Magnetic System
    const hero = document.getElementById('hero');
    const magneticBtns = document.querySelectorAll('.magnetic-btn');

    hero.addEventListener('mousemove', (e) => {
        const rect = hero.getBoundingClientRect();
        const x = ((e.clientX - rect.left) / rect.width) * 100;
        const y = ((e.clientY - rect.top) / rect.height) * 100;
        hero.style.setProperty('--mouse-x', `${x}%`);
        hero.style.setProperty('--mouse-y', `${y}%`);

        // Parallax Container
        const centerX = window.innerWidth / 2;
        const centerY = window.innerHeight / 2;
        const tiltX = (centerX - e.clientX) / 80;
        const tiltY = (centerY - e.clientY) / 80;

        const wrapper = hero.querySelector('.parallax-container');
        if (wrapper) {
            wrapper.style.transform = `rotateX(${-tiltY}deg) rotateY(${tiltX}deg) translateZ(50px)`;
        }

        // Magnetic Buttons Logic
        magneticBtns.forEach(btn => {
            const bRect = btn.getBoundingClientRect();
            const bCenterX = bRect.left + bRect.width / 2;
            const bCenterY = bRect.top + bRect.height / 2;
            const distance = Math.hypot(e.clientX - bCenterX, e.clientY - bCenterY);

            if (distance < 150) {
                const moveX = (e.clientX - bCenterX) * 0.3;
                const moveY = (e.clientY - bCenterY) * 0.3;
                btn.style.transform = `translate(${moveX}px, ${moveY}px)`;
            } else {
                btn.style.transform = `translate(0, 0)`;
            }
        });
    });

    // 3. System Management
    const themeObserver = new MutationObserver(() => initBubbleEngine());
    themeObserver.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });

    document.addEventListener('DOMContentLoaded', initBubbleEngine);
</script>

<style>
    @keyframes scroll-fast {
        0% {
            transform: translateY(-100%);
        }

        100% {
            transform: translateY(200%);
        }
    }

    .animate-scroll-fast {
        animation: scroll-fast 2s linear infinite;
    }
</style>