<!DOCTYPE html>
<html lang="id" class="dark scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'EventPass — Platform Tiket Event & QR Gate Scanner' }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 antialiased min-h-screen flex flex-col selection:bg-emerald-500 selection:text-white">

    <!-- Top Navigation Header -->
    <header class="sticky top-0 z-40 bg-slate-900/80 backdrop-blur-md border-b border-slate-800 transition">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-emerald-500 to-teal-600 flex items-center justify-center text-white font-black text-xl shadow-lg shadow-emerald-500/20 group-hover:scale-105 transition">
                    🎟️
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-extrabold tracking-tight text-white leading-none">EventPass<span class="text-emerald-400">.</span></span>
                    <span class="text-[10px] text-slate-400 font-medium tracking-wider uppercase">SaaS Ticketing & QR Gate Pass</span>
                </div>
            </a>

            <!-- Navigation Links -->
            <nav class="flex items-center gap-4 sm:gap-6 text-xs font-bold uppercase tracking-wider">
                <a href="{{ route('home') }}" class="hover:text-emerald-400 transition {{ request()->routeIs('home') ? 'text-emerald-400 font-black' : 'text-slate-300' }}">
                    Katalog Event
                </a>

                <a href="{{ route('scanner.index') }}" class="px-3.5 py-2 bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 rounded-xl hover:bg-emerald-500 hover:text-white transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5zM13.5 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5z"/></svg>
                    <span>App Scanner Gate 📱</span>
                </a>

                @auth
                    <a href="{{ route('admin.dashboard') }}" class="px-3.5 py-2 bg-amber-500/10 text-amber-400 border border-amber-500/30 rounded-xl hover:bg-amber-500 hover:text-slate-950 transition font-black">
                        Admin Control 👑
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white rounded-xl transition">
                        Masuk Admin
                    </a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- Alert Messages -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 w-full">
        @if(session('success'))
            <div class="p-4 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-2xl text-xs font-bold flex items-center gap-3 shadow-lg shadow-emerald-500/5">
                <svg class="w-5 h-5 shrink-0 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="p-4 bg-rose-500/10 border border-rose-500/30 text-rose-400 rounded-2xl text-xs font-bold flex items-center gap-3 shadow-lg shadow-rose-500/5">
                <svg class="w-5 h-5 shrink-0 text-rose-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif
    </div>

    <!-- Main Content Area -->
    <main class="flex-1 py-8">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-800 bg-slate-900/50 py-8 text-center text-xs text-slate-500">
        <div class="max-w-7xl mx-auto px-4 space-y-2">
            <p class="font-bold text-slate-400">EventPass — Ultimate Event Ticketing & QR Gate Pass Scanner Platform</p>
            <p class="font-light text-[10px]">Powered by <a href="https://eshace.com" target="_blank" class="text-emerald-400 font-bold hover:underline">SHC</a> for <a href="https://www.youtube.com/@codeworshipper?sub_confirmation=1" target="_blank" class="text-emerald-400 font-bold hover:underline">CodeWorshipper</a>.</p>
        </div>
    </footer>

</body>
</html>
