<x-app-layout title="Katalog Event & Konser Terbaru — EventPass">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        
        <!-- Hero Showcase Banner -->
        <div class="relative rounded-[36px] overflow-hidden bg-slate-900/90 border border-slate-800 p-8 sm:p-16 shadow-2xl">
            <!-- Ambient Background Glows -->
            <div class="absolute -right-16 -bottom-16 w-[450px] h-[450px] bg-gradient-to-br from-emerald-500/20 via-teal-500/10 to-transparent rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -left-16 -top-16 w-[400px] h-[400px] bg-gradient-to-tr from-indigo-500/20 via-purple-500/10 to-transparent rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                <!-- Left Content Column -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2.5 px-4 py-1.5 bg-slate-950/80 border border-emerald-500/30 backdrop-blur-md rounded-full">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                        <span class="text-xs font-black text-emerald-400 uppercase tracking-widest">SaaS Event Ticketing & Gate Scanner</span>
                    </div>

                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-heading font-black text-white tracking-tight leading-[1.1]">
                        Pesan Tiket Event <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-teal-300 to-cyan-400 glow-text-emerald">
                            & Scan Gate Real-Time
                        </span>
                    </h1>

                    <p class="text-slate-300 text-sm sm:text-base font-light leading-relaxed max-w-2xl mx-auto lg:mx-0">
                        Platform e-ticketing modern untuk konser, seminar, dan workshop. Dapatkan E-Tiket QR Code unik yang diverifikasi otomatis di pintu gate lewat kamera HP/Laptop panitia.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="pt-2 flex flex-wrap items-center justify-center lg:justify-start gap-4">
                        <a href="#katalog-event" class="px-7 py-3.5 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 text-white rounded-2xl text-xs font-heading font-black uppercase tracking-wider transition-all duration-300 shadow-xl shadow-emerald-500/25 hover:scale-[1.02] flex items-center gap-2">
                            <span>Jelajahi Event Sekarang</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3"/></svg>
                        </a>
                        <a href="{{ route('scanner.index') }}" class="px-7 py-3.5 bg-slate-950/80 hover:bg-slate-900 border border-slate-700 text-slate-200 rounded-2xl text-xs font-bold uppercase tracking-wider backdrop-blur-md transition-all duration-300 hover:border-emerald-500/40 flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z"/><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z"/></svg>
                            <span>App Scanner Gate</span>
                        </a>
                    </div>
                </div>

                <!-- Right Feature Stats Card -->
                <div class="lg:col-span-5 relative">
                    <div class="glass-card rounded-3xl p-6 sm:p-8 space-y-6 border border-emerald-500/20 shadow-2xl relative z-10 animate-float">
                        <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Performa Gate System</span>
                            <span class="px-2.5 py-1 bg-emerald-500/20 text-emerald-400 rounded-full text-[10px] font-mono font-bold">OPTIMIZED</span>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-4 bg-slate-950/80 border border-slate-800 rounded-2xl space-y-1">
                                <span class="text-2xl font-black text-emerald-400 font-heading">0.2 Detik</span>
                                <p class="text-[10px] text-slate-400 font-bold uppercase">Kecepatan Scan Gate</p>
                            </div>
                            <div class="p-4 bg-slate-950/80 border border-slate-800 rounded-2xl space-y-1">
                                <span class="text-2xl font-black text-indigo-400 font-heading">100% QR</span>
                                <p class="text-[10px] text-slate-400 font-bold uppercase">Encrypted Security</p>
                            </div>
                            <div class="p-4 bg-slate-950/80 border border-slate-800 rounded-2xl space-y-1">
                                <span class="text-2xl font-black text-amber-400 font-heading">PDF & Live</span>
                                <p class="text-[10px] text-slate-400 font-bold uppercase">Cetak E-Tiket</p>
                            </div>
                            <div class="p-4 bg-slate-950/80 border border-slate-800 rounded-2xl space-y-1">
                                <span class="text-2xl font-black text-teal-400 font-heading">WhatsApp</span>
                                <p class="text-[10px] text-slate-400 font-bold uppercase">Auto Notification</p>
                            </div>
                        </div>

                        <div class="p-3.5 bg-emerald-500/10 border border-emerald-500/20 rounded-2xl flex items-center gap-3">
                            <svg class="w-6 h-6 text-emerald-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751A11.959 11.959 0 0112 2.714z"/></svg>
                            <p class="text-[11px] text-emerald-300 font-medium leading-tight">
                                Terproteksi sistem cegah tiket ganda. QR Code yang sudah di-scan tidak bisa digunakan ulang.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured Events Section -->
        <div id="katalog-event" class="space-y-8">
            <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between gap-4 border-b border-slate-800/80 pb-6">
                <div class="space-y-1">
                    <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest">Katalog Acara Terbaru</span>
                    <h2 class="text-2xl sm:text-3xl font-heading font-extrabold text-white">Event & Konser Populer</h2>
                </div>
                <p class="text-xs text-slate-400 font-light max-w-sm">Pilih event resmi favorit Anda dan pesan tiketnya secara instan.</p>
            </div>

            <!-- Event Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($events as $event)
                    <div x-data="tiltCard()" @mousemove="onMouseMove($event)" @mouseleave="onMouseLeave()" 
                         :style="`transform: perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(${scale});`"
                         class="glass-card rounded-[28px] overflow-hidden flex flex-col justify-between group relative transition-transform duration-200 ease-out preserve-3d">
                        <!-- Dynamic Glare Light Sheen -->
                        <div class="absolute inset-0 pointer-events-none rounded-[28px] transition-opacity duration-300 z-30"
                             :style="`background: radial-gradient(circle at ${glareX}% ${glareY}%, rgba(255,255,255,0.25) 0%, transparent 60%); opacity: ${glareOpacity};`"></div>

                        <div>
                            <!-- Event Image Banner -->
                            <div class="relative h-56 bg-slate-900 overflow-hidden">
                                <img src="{{ $event->banner_image }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-80"></div>
                                
                                <div class="absolute top-4 left-4 right-4 flex items-center justify-between">
                                    <span class="px-3 py-1 bg-slate-950/80 backdrop-blur-md border border-slate-700/80 rounded-full text-[10px] font-mono font-bold text-emerald-400 shadow-md flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 9v7.5"/></svg>
                                        <span>{{ $event->event_date->format('d M Y') }}</span>
                                    </span>
                                    <span class="px-3 py-1 bg-emerald-500/20 backdrop-blur-md border border-emerald-500/30 rounded-full text-[10px] font-black text-emerald-300 uppercase tracking-widest">
                                        TERBIT
                                    </span>
                                </div>

                                <div class="absolute bottom-3 left-4 right-4 flex items-center gap-2 text-xs text-slate-300">
                                    <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                                    <span class="truncate font-medium">{{ $event->location_name }}</span>
                                </div>
                            </div>

                            <!-- Event Details -->
                            <div class="p-6 space-y-3">
                                <h3 class="text-lg font-heading font-bold text-white group-hover:text-emerald-400 transition leading-snug line-clamp-2">
                                    {{ $event->title }}
                                </h3>
                                <p class="text-xs text-slate-400 font-light line-clamp-2 leading-relaxed">
                                    {{ $event->description }}
                                </p>
                            </div>
                        </div>

                        <!-- Ticket Price & Order Button -->
                        <div class="p-6 pt-0 border-t border-slate-800/60 flex items-center justify-between gap-3 mt-4">
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

        <!-- Upsell & Feature Showcase -->
        <div class="relative rounded-[32px] overflow-hidden p-8 sm:p-12 glass-panel border border-emerald-500/30 shadow-2xl flex flex-col lg:flex-row items-center justify-between gap-8">
            <div class="space-y-3 text-center lg:text-left">
                <span class="px-3 py-1 bg-amber-500/10 text-amber-400 border border-amber-500/30 rounded-full text-[10px] font-black uppercase tracking-wider flex items-center gap-1.5 w-max mx-auto lg:mx-0">
                    <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/></svg>
                    <span>Integrasi WACentrix WA Gateway</span>
                </span>
                <h3 class="text-2xl font-heading font-bold text-white">Otomatisasi Pengiriman E-Tiket PDF ke WhatsApp Pembeli!</h3>
                <p class="text-xs text-slate-300 font-light max-w-xl leading-relaxed">
                    Tingkatkan keikutsertaan acara Anda dengan mengirimkan file PDF E-Tiket resmi secara otomatis ke nomor WhatsApp pembeli detik itu juga setelah pembayaran berhasil.
                </p>
            </div>

            <a href="https://wa.eshace.com" target="_blank" rel="noopener noreferrer" class="px-8 py-4 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-slate-950 rounded-2xl text-xs font-heading font-black uppercase tracking-wider transition shadow-xl shadow-amber-500/20 whitespace-nowrap shrink-0 hover:scale-105 flex items-center gap-2">
                <span>Pelajari WA Gateway</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
            </a>
        </div>

    </div>
</x-app-layout>
