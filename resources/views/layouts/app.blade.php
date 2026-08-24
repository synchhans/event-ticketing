<!DOCTYPE html>
<html lang="id" class="dark scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'EventPass — Next-Gen Event Ticketing & Live QR Scanner' }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="alternate icon" href="{{ asset('favicon.ico') }}">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Platform e-ticketing modern untuk konser, seminar, dan workshop. Pesan tiket online resmi, dapatkan E-Tiket PDF ber-QR Code unik, dan scan gate instan real-time.">
    <meta name="keywords" content="tiket event online, e-tiket qr code, gate pass scanner, pesan tiket konser, ticketing system indonesia, codeworshipper, shc">
    <meta name="author" content="SHC for CodeWorshipper">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'EventPass — Next-Gen Event Ticketing & Live QR Scanner' }}">
    <meta property="og:description" content="Pesan tiket event resmi, dapatkan E-Tiket PDF ber-QR Code unik, dan verifikasi gate masuk otomatis secara real-time.">
    <meta property="og:image" content="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1200&q=80">
    <meta property="og:site_name" content="EventPass">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $title ?? 'EventPass — Next-Gen Event Ticketing & Live QR Scanner' }}">
    <meta name="twitter:description" content="Pesan tiket event resmi, dapatkan E-Tiket PDF ber-QR Code unik, dan verifikasi gate masuk otomatis secara real-time.">
    <meta name="twitter:image" content="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1200&q=80">

    <!-- JSON-LD Structured Data for Google Rich Snippets -->
    @verbatim
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "SoftwareApplication",
      "name": "EventPass",
      "applicationCategory": "BusinessApplication",
      "operatingSystem": "All",
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "IDR"
      },
      "description": "Platform SaaS e-ticketing event online dan scanner pintu masuk gate QR code real-time."
    }
    </script>
    @endverbatim

    <!-- Google Fonts: Plus Jakarta Sans & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        h1, h2, h3, h4, .font-heading {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 antialiased min-h-screen flex flex-col selection:bg-emerald-500 selection:text-white bg-mesh relative overflow-x-hidden">

    <!-- Ambient Lighting Background -->
    <div class="fixed top-0 left-1/4 w-96 h-96 bg-emerald-500/10 rounded-full blur-[120px] pointer-events-none z-0"></div>
    <div class="fixed top-1/3 right-10 w-96 h-96 bg-indigo-500/10 rounded-full blur-[140px] pointer-events-none z-0"></div>

    <!-- Top Navigation Header -->
    <header class="sticky top-0 z-50 glass-panel border-b border-slate-800/80 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between gap-4">
            
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3.5 group">
                <div class="relative">
                    <div class="absolute -inset-1 bg-gradient-to-r from-emerald-500 to-teal-400 rounded-2xl blur opacity-30 group-hover:opacity-100 transition duration-500"></div>
                    <div class="relative w-11 h-11 rounded-2xl bg-slate-900 border border-emerald-500/30 flex items-center justify-center text-emerald-400 shadow-lg group-hover:scale-105 transition duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-12v.75m0 3v.75m0 3v.75m0 3V18m-3-12h18c.621 0 1.125.504 1.125 1.125v11.75c0 .621-.504 1.125-1.125 1.125H3c-.621 0-1.125-.504-1.125-1.125V7.125C1.875 6.504 2.379 6 3 6z"/>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="flex items-center gap-2">
                        <span class="text-xl font-heading font-black tracking-tight text-white leading-none">
                            Event<span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-300">Pass</span>
                        </span>
                        <span class="px-2 py-0.5 bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 rounded-full text-[9px] font-extrabold uppercase tracking-widest flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> SYSTEM LIVE
                        </span>
                    </div>
                    <span class="text-[10px] text-slate-400 font-medium tracking-wider uppercase">Ticketing & Gate Scanner</span>
                </div>
            </a>

            <!-- Navigation Links -->
            <nav class="flex items-center gap-2 sm:gap-4 text-xs font-bold uppercase tracking-wider">
                <a href="{{ route('home') }}" class="px-4 py-2.5 rounded-xl transition duration-300 flex items-center gap-2 {{ request()->routeIs('home') ? 'bg-slate-900 text-emerald-400 border border-emerald-500/30 font-black shadow-sm' : 'text-slate-300 hover:text-white hover:bg-slate-900/60' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
                    <span>Katalog Event</span>
                </a>

                <a href="{{ route('scanner.index') }}" class="px-4 py-2.5 bg-gradient-to-r from-emerald-500/10 via-teal-500/10 to-emerald-500/10 text-emerald-400 border border-emerald-500/30 rounded-xl hover:from-emerald-500 hover:to-teal-500 hover:text-white transition duration-300 flex items-center gap-2 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5zM13.5 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5z"/></svg>
                    <span>App Scanner</span>
                </a>

                @auth
                    <a href="{{ route('admin.dashboard') }}" class="px-4 py-2.5 bg-amber-500/10 text-amber-400 border border-amber-500/30 rounded-xl hover:bg-amber-500 hover:text-slate-950 transition duration-300 font-black flex items-center gap-2 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751A11.959 11.959 0 0112 2.714z"/></svg>
                        <span>Admin Control</span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2.5 bg-slate-900 border border-slate-800 hover:border-slate-700 text-white rounded-xl transition">
                        Masuk Admin
                    </a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- Notification Alert Toasts -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 w-full relative z-30">
        @if(session('success'))
            <div class="p-4 bg-emerald-950/80 border border-emerald-500/40 text-emerald-300 rounded-2xl text-xs font-bold flex items-center justify-between gap-3 shadow-xl backdrop-blur-md glow-emerald">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-emerald-500/20 flex items-center justify-center text-emerald-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="p-4 bg-rose-950/80 border border-rose-500/40 text-rose-300 rounded-2xl text-xs font-bold flex items-center justify-between gap-3 shadow-xl backdrop-blur-md">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-rose-500/20 flex items-center justify-center text-rose-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                    </div>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif
    </div>

    <!-- Main Content Body -->
    <main class="flex-1 py-8 relative z-10">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-800/80 bg-slate-950/90 backdrop-blur-md py-12 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6 pb-8 border-b border-slate-800/80">
                <div class="space-y-1 text-center md:text-left">
                    <div class="flex items-center justify-center md:justify-start gap-2">
                        <span class="text-xl font-heading font-black text-white">Event<span class="text-emerald-400">Pass</span></span>
                        <span class="px-2 py-0.5 bg-slate-800 text-slate-400 rounded text-[10px] font-mono">v2.0 PRO</span>
                    </div>
                    <p class="text-xs text-slate-400 font-light max-w-md">Platform Tiket Event Online + QR Gate Pass Scanner HP/Laptop Real-time.</p>
                </div>

                <div class="flex flex-wrap items-center justify-center gap-4 text-xs font-bold">
                    <a href="{{ route('home') }}" class="text-slate-400 hover:text-emerald-400 transition">Katalog Event</a>
                    <span class="text-slate-800">•</span>
                    <a href="{{ route('scanner.index') }}" class="text-slate-400 hover:text-emerald-400 transition">App Scanner Gate</a>
                    <span class="text-slate-800">•</span>
                    <a href="{{ route('admin.dashboard') }}" class="text-slate-400 hover:text-amber-400 transition">Admin Dashboard</a>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} EventPass. All rights reserved.</p>
                <p class="font-light text-[11px]">
                    Powered by <a href="https://eshace.com" target="_blank" rel="noopener noreferrer" class="text-emerald-400 font-bold hover:underline">SHC</a> for <a href="https://www.youtube.com/@codeworshipper?sub_confirmation=1" target="_blank" rel="noopener noreferrer" class="text-emerald-400 font-bold hover:underline">CodeWorshipper</a>.
                </p>
            </div>
        </div>
        <script>
        function tiltCard() {
            return {
                rotateX: 0,
                rotateY: 0,
                scale: 1,
                glareX: 50,
                glareY: 50,
                glareOpacity: 0,
                onMouseMove(e) {
                    const rect = this.$el.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    
                    this.rotateX = -((y - centerY) / 14).toFixed(2);
                    this.rotateY = ((x - centerX) / 14).toFixed(2);
                    this.scale = 1.03;
                    this.glareX = (x / rect.width) * 100;
                    this.glareY = (y / rect.height) * 100;
                    this.glareOpacity = 0.2;
                },
                onMouseLeave() {
                    this.rotateX = 0;
                    this.rotateY = 0;
                    this.scale = 1;
                    this.glareOpacity = 0;
                }
            }
        }
    </script>
</body>
</html>
