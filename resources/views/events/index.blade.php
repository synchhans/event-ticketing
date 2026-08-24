<x-app-layout title="EventPass — Next-Gen Event Ticketing & Live QR Gate Scanner">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        
        <!-- Live Ticker Announcement Bar -->
        <div class="glass-panel rounded-full p-2.5 px-6 border border-emerald-500/30 flex items-center justify-between gap-4 shadow-xl backdrop-blur-md glow-emerald">
            <div class="flex items-center gap-3 truncate">
                <span class="px-3 py-1 bg-gradient-to-r from-emerald-500 to-teal-500 text-white rounded-full text-[10px] font-heading font-black uppercase tracking-widest shrink-0 animate-pulse">
                    LIVE NOW
                </span>
                <span class="text-xs font-bold text-slate-200 truncate">
                    CodeWorshipper Tech Fest 2026 Tiket Presale Terbit! Kuota Terbatas.
                </span>
            </div>
            <a href="#katalog-event" class="text-xs font-bold text-emerald-400 hover:text-emerald-300 hover:underline shrink-0 flex items-center gap-1">
                <span>Beli Tiket</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
            </a>
        </div>

        <!-- Mega Epic Hero Showcase Stage -->
        <div class="relative rounded-[40px] overflow-hidden bg-slate-900/90 border border-slate-800 p-8 sm:p-16 lg:p-20 shadow-2xl cyber-grid">
            <!-- Ambient Epic Lighting Spheres -->
            <div class="absolute -right-20 -bottom-20 w-[550px] h-[550px] bg-gradient-to-br from-emerald-500/25 via-teal-500/15 to-transparent rounded-full blur-[140px] pointer-events-none"></div>
            <div class="absolute -left-20 -top-20 w-[500px] h-[500px] bg-gradient-to-tr from-indigo-500/25 via-purple-500/15 to-transparent rounded-full blur-[140px] pointer-events-none"></div>

            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left Content Column -->
                <div class="lg:col-span-7 space-y-8 text-center lg:text-left">
                    <div class="inline-flex items-center gap-3 px-4 py-2 bg-slate-950/80 border border-emerald-500/40 backdrop-blur-md rounded-full shadow-lg">
                        <svg class="w-4 h-4 text-emerald-400 animate-spin" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/></svg>
                        <span class="text-xs font-black text-emerald-400 uppercase tracking-widest">NEXT-GEN EVENT TICKETING & GATE SYSTEM</span>
                    </div>

                    <h1 class="text-4xl sm:text-6xl lg:text-7xl font-heading font-black text-white tracking-tight leading-[1.05]">
                        Platform Tiket Event <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-300 via-teal-200 to-cyan-300 animate-shimmer glow-text-emerald">
                            & Gate Pass Real-Time
                        </span>
                    </h1>

                    <p class="text-slate-300 text-sm sm:text-lg font-light leading-relaxed max-w-2xl mx-auto lg:mx-0">
                        Kelola event profesional dengan pemesanan tiket otomatis, E-Tiket PDF ber-QR Code unforgeable, dan pemindaian gate tercepat (0.2s) langsung lewat kamera HP/Laptop panitia.
                    </p>

                    <!-- CTA Action Buttons -->
                    <div class="pt-3 flex flex-wrap items-center justify-center lg:justify-start gap-4">
                        <a href="#katalog-event" class="px-8 py-4 bg-gradient-to-r from-emerald-500 via-teal-500 to-emerald-600 hover:from-emerald-400 hover:to-teal-400 text-white rounded-2xl text-xs font-heading font-black uppercase tracking-widest transition-all duration-300 shadow-2xl shadow-emerald-500/30 hover:scale-105 flex items-center gap-2.5">
                            <span>Jelajahi Katalog Event</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3"/></svg>
                        </a>
                        <a href="{{ route('scanner.index') }}" class="px-8 py-4 bg-slate-950/80 hover:bg-slate-900 border border-slate-700 text-slate-200 rounded-2xl text-xs font-bold uppercase tracking-widest backdrop-blur-md transition-all duration-300 hover:border-emerald-500/50 flex items-center gap-2.5 shadow-xl">
                            <svg class="w-4.5 h-4.5 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z"/><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z"/></svg>
                            <span>App Gate Scanner</span>
                        </a>
                    </div>
                </div>

                <!-- Right Interactive 3D QR Demo Scanner Sandbox -->
                <div class="lg:col-span-5 relative" x-data="heroDemoScanner()">
                    <div class="glass-card rounded-[36px] p-6 sm:p-8 space-y-6 border border-emerald-500/30 shadow-2xl relative z-10 animate-float-epic glow-emerald preserve-3d">
                        
                        <!-- Header Bar -->
                        <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-emerald-400 animate-ping"></span>
                                <span class="text-xs font-heading font-black text-white uppercase tracking-wider">Simulasi QR Gate Pass</span>
                            </div>
                            <span class="px-2.5 py-1 bg-emerald-500/20 text-emerald-400 rounded-full text-[10px] font-mono font-bold">INTERACTIVE DEMO</span>
                        </div>

                        <!-- Simulated Holographic Ticket Pass -->
                        <div class="p-5 bg-slate-950 rounded-2xl border border-slate-800 space-y-4 text-center">
                            <div class="p-4 bg-white rounded-2xl inline-block shadow-2xl border-2 border-emerald-500/40 relative group">
                                <svg class="w-28 h-28 text-slate-950 mx-auto" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 3h8v8H3V3zm2 2v4h4V5H5zm8-2h8v8h-8V3zm2 2v4h4V5h-4zM3 13h8v8H3v-8zm2 2v4h4v-4H5zm13-2h3v2h-3v-2zm-3 3h2v3h-2v-3zm3 0h3v5h-3v-5zm-3 3h2v2h-2v-2z"/>
                                </svg>
                                <div class="absolute inset-0 bg-emerald-500/10 rounded-2xl opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none"></div>
                            </div>

                            <div class="space-y-1">
                                <span class="text-[10px] text-slate-500 font-mono uppercase font-bold tracking-wider">Kode Demo E-Tiket</span>
                                <h4 class="text-sm font-mono font-black text-emerald-400">TKT-2026-DEMO-001</h4>
                            </div>

                            <!-- Interactive Demo Scan Button -->
                            <button @click="testScan()" class="w-full py-3 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 text-white rounded-xl text-xs font-heading font-bold uppercase tracking-wider transition shadow-lg shadow-emerald-500/20 flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5zM13.5 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5z"/></svg>
                                <span>Uji Coba Scan Simulasi Gate</span>
                            </button>
                        </div>

                        <!-- Result Toast Feedback -->
                        <div x-show="demoScanned" class="p-4 bg-emerald-950/90 border border-emerald-500/50 text-emerald-300 rounded-2xl text-xs font-bold flex items-center justify-between gap-3 shadow-xl backdrop-blur-md glow-emerald" style="display: none;" x-transition>
                            <div class="flex items-center gap-3">
                                <svg class="w-6 h-6 text-emerald-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <div>
                                    <h5 class="font-heading font-black text-white">GATE ACCESSED — VERIFIED 🟢</h5>
                                    <p class="text-[10px] text-emerald-400">Pengunjung: CodeWorshipper VIP • Respon Gate: 0.18s</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Bento Box Architectural Grid Showcase -->
        <div class="space-y-8">
            <div class="text-center space-y-2 max-w-2xl mx-auto">
                <span class="px-3 py-1 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-full text-[10px] font-mono font-bold uppercase tracking-widest">
                    SYSTEM ARCHITECTURE
                </span>
                <h2 class="text-3xl sm:text-4xl font-heading font-black text-white">Fitur Unggulan Kelas Enterprise</h2>
                <p class="text-xs sm:text-sm text-slate-400 font-light leading-relaxed">Dirancang untuk menjamin kelancaran antrean gate konser tanpa bottleneck.</p>
            </div>

            <!-- Asymmetric Bento Grid -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                <!-- Bento 1 (Large 7 Cols) -->
                <div class="md:col-span-7 glass-card rounded-[32px] p-8 space-y-6 border border-slate-800 flex flex-col justify-between group">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5zM13.5 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5z"/></svg>
                        </div>
                        <h3 class="text-xl font-heading font-extrabold text-white group-hover:text-emerald-400 transition">Verifikasi Kamera HP/Laptop Tanpa Alat Tambahan</h3>
                        <p class="text-xs text-slate-300 font-light leading-relaxed">
                            Panitia gate cukup membuka aplikasi scanner di browser HP/Laptop. Menggunakan teknologi HTML5 Camera & Web Audio API chime feedback (suara valid hijau / alarm merah jika tiket telah dipakai).
                        </p>
                    </div>

                    <div class="p-4 bg-slate-950/90 rounded-2xl border border-slate-800 flex items-center justify-between text-xs font-mono text-emerald-400">
                        <span>LATENCY: 0.18 SECOND</span>
                        <span>AUDIO: AUDIO_CONTEXT SINE CHIME</span>
                    </div>
                </div>

                <!-- Bento 2 (Small 5 Cols) -->
                <div class="md:col-span-5 glass-card rounded-[32px] p-8 space-y-6 border border-slate-800 flex flex-col justify-between group">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-500/20 text-indigo-400 border border-indigo-500/30 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751A11.959 11.959 0 0112 2.714z"/></svg>
                        </div>
                        <h3 class="text-xl font-heading font-extrabold text-white group-hover:text-indigo-400 transition">Keamanan Anti Tiket Ganda</h3>
                        <p class="text-xs text-slate-300 font-light leading-relaxed">
                            Setiap E-Tiket dilengkapi token QR unik terenkripsi. Begitu di-scan di gate venue, status otomatis berubah menjadi USED dan ditolak jika di-scan ulang.
                        </p>
                    </div>

                    <div class="p-4 bg-slate-950/90 rounded-2xl border border-slate-800 text-xs font-mono text-indigo-400">
                        <span>PROTECTION: ATOMIC DB LOCK</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured Events Catalog Section -->
        <div id="katalog-event" class="space-y-8">
            <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between gap-4 border-b border-slate-800/80 pb-6">
                <div class="space-y-1">
                    <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest">Katalog Acara Resmi</span>
                    <h2 class="text-2xl sm:text-3xl font-heading font-extrabold text-white">Event & Konser Populer</h2>
                </div>
                <p class="text-xs text-slate-400 font-light max-w-sm">Pilih event resmi favorit Anda dan pesan tiketnya secara instan.</p>
            </div>

            <!-- Event Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($events as $event)
                    <div x-data="tiltCard()" @mousemove="onMouseMove($event)" @mouseleave="onMouseLeave()" 
                         :style="`transform: perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(${scale});`"
                         class="glass-card rounded-[32px] overflow-hidden flex flex-col justify-between group relative transition-transform duration-200 ease-out preserve-3d">
                        <!-- Dynamic Glare Light Sheen -->
                        <div class="absolute inset-0 pointer-events-none rounded-[32px] transition-opacity duration-300 z-30"
                             :style="`background: radial-gradient(circle at ${glareX}% ${glareY}%, rgba(255,255,255,0.25) 0%, transparent 60%); opacity: ${glareOpacity};`"></div>

                        <div>
                            <!-- Event Image Banner -->
                            <div class="relative h-60 bg-slate-900 overflow-hidden">
                                <img src="{{ $event->banner_image }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/30 to-transparent opacity-90"></div>
                                
                                <div class="absolute top-4 left-4 right-4 flex items-center justify-between">
                                    <span class="px-3.5 py-1.5 bg-slate-950/80 backdrop-blur-md border border-slate-700/80 rounded-full text-[10px] font-mono font-bold text-emerald-400 shadow-md flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 9v7.5"/></svg>
                                        <span>{{ $event->event_date->format('d M Y') }}</span>
                                    </span>
                                    <span class="px-3.5 py-1.5 bg-emerald-500/20 backdrop-blur-md border border-emerald-500/30 rounded-full text-[10px] font-black text-emerald-300 uppercase tracking-widest">
                                        TERBIT
                                    </span>
                                </div>

                                <div class="absolute bottom-3 left-4 right-4 flex items-center gap-2 text-xs text-slate-300">
                                    <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                                    <span class="truncate font-medium">{{ $event->location_name }}</span>
                                </div>
                            </div>

                            <!-- Event Details -->
                            <div class="p-6 sm:p-8 space-y-3">
                                <h3 class="text-lg font-heading font-bold text-white group-hover:text-emerald-400 transition leading-snug line-clamp-2">
                                    {{ $event->title }}
                                </h3>
                                <p class="text-xs text-slate-400 font-light line-clamp-2 leading-relaxed">
                                    {{ $event->description }}
                                </p>
                            </div>
                        </div>

                        <!-- Ticket Price & Order Button -->
                        <div class="p-6 sm:p-8 pt-0 border-t border-slate-800/60 flex items-center justify-between gap-3 mt-4">
                            <div>
                                <span class="text-[10px] text-slate-500 font-bold uppercase tracking-wider block">Mulai Dari</span>
                                <span class="text-lg font-heading font-black text-emerald-400">
                                    @php
                                        $minPrice = $event->ticketCategories->min('price');
                                    @endphp
                                    {{ $minPrice ? 'Rp ' . number_format($minPrice, 0, ',', '.') : 'GRATIS' }}
                                </span>
                            </div>
                            <a href="{{ route('events.show', $event->slug) }}" class="px-5 py-2.5 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 text-white rounded-xl text-xs font-heading font-bold uppercase tracking-wider transition shadow-lg shadow-emerald-500/20 flex items-center gap-2">
                                <span>Pesan Tiket</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-12v.75m0 3v.75m0 3v.75m0 3V18m-3-12h18c.621 0 1.125.504 1.125 1.125v11.75c0 .621-.504 1.125-1.125 1.125H3c-.621 0-1.125-.504-1.125-1.125V7.125C1.875 6.504 2.379 6 3 6z"/></svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center text-slate-500 glass-card rounded-3xl">
                        <p class="text-base font-bold text-slate-400">Belum Ada Event Yang Diterbitkan.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Upsell Banner -->
        <div class="relative rounded-[36px] overflow-hidden p-8 sm:p-12 glass-panel border border-emerald-500/30 shadow-2xl flex flex-col lg:flex-row items-center justify-between gap-8 glow-emerald">
            <div class="space-y-3 text-center lg:text-left">
                <span class="px-3.5 py-1 bg-amber-500/10 text-amber-400 border border-amber-500/30 rounded-full text-[10px] font-black uppercase tracking-wider flex items-center gap-1.5 w-max mx-auto lg:mx-0">
                    <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/></svg>
                    <span>Integrasi WACentrix WA Gateway</span>
                </span>
                <h3 class="text-2xl sm:text-3xl font-heading font-bold text-white">Otomatisasi Pengiriman E-Tiket PDF ke WhatsApp Pembeli!</h3>
                <p class="text-xs sm:text-sm text-slate-300 font-light max-w-xl leading-relaxed">
                    Kirimkan file PDF E-Tiket resmi secara instan ke nomor WhatsApp pembeli detik itu juga setelah pembayaran berhasil disetujui.
                </p>
            </div>

            <a href="https://wa.eshace.com" target="_blank" rel="noopener noreferrer" class="px-8 py-4 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-slate-950 rounded-2xl text-xs font-heading font-black uppercase tracking-wider transition shadow-xl shadow-amber-500/20 whitespace-nowrap shrink-0 hover:scale-105 flex items-center gap-2">
                <span>Pelajari WA Gateway</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
            </a>
        </div>

    </div>

    <!-- Script for Hero Interactive Demo Scanner -->
    <script>
        function heroDemoScanner() {
            return {
                demoScanned: false,
                testScan() {
                    this.demoScanned = true;
                    try {
                        const ctx = new (window.AudioContext || window.webkitAudioContext)();
                        const osc = ctx.createOscillator();
                        const gain = ctx.createGain();
                        osc.connect(gain);
                        gain.connect(ctx.destination);
                        osc.type = 'sine';
                        osc.frequency.setValueAtTime(660, ctx.currentTime);
                        osc.frequency.exponentialRampToValueAtTime(880, ctx.currentTime + 0.15);
                        gain.gain.setValueAtTime(0.3, ctx.currentTime);
                        osc.start();
                        osc.stop(ctx.currentTime + 0.25);
                    } catch(e) {}
                }
            }
        }
    </script>
</x-app-layout>
