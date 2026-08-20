<x-app-layout title="Katalog Event & Konser — EventPass">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <!-- Hero Section -->
        <div class="relative bg-gradient-to-r from-emerald-600 via-teal-600 to-indigo-600 rounded-[32px] p-8 sm:p-14 text-white shadow-2xl overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-96 h-96 bg-white/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="relative z-10 space-y-4 max-w-2xl">
                <span class="px-3.5 py-1 bg-white/20 backdrop-blur-md rounded-full text-[10px] font-black uppercase tracking-widest text-white border border-white/30">
                    🎟️ Platform Tiket Event & QR Scanner Real-time
                </span>
                <h1 class="text-3xl sm:text-5xl font-black tracking-tight leading-tight">
                    Temukan Event Seru & Dapatkan E-Tiket Instan
                </h1>
                <p class="text-white/80 text-xs sm:text-sm font-light leading-relaxed">
                    Pesan tiket konser, seminar, dan workshop secara resmi. E-Tiket dilengkapi QR Code unik yang akan di-scan langsung oleh panitia di gate venue.
                </p>
                <div class="pt-2 flex flex-wrap gap-3">
                    <a href="#events-list" class="px-6 py-3 bg-white text-slate-900 rounded-2xl text-xs font-extrabold uppercase tracking-wider hover:bg-slate-100 transition shadow-lg">
                        Jelajahi Event Sekarang 👇
                    </a>
                    <a href="{{ route('scanner.index') }}" class="px-6 py-3 bg-white/10 hover:bg-white/20 border border-white/30 text-white rounded-2xl text-xs font-bold uppercase tracking-wider backdrop-blur-md transition">
                        Buka Scanner Panitia 📱
                    </a>
                </div>
            </div>
        </div>

        <!-- Featured Events Section -->
        <div id="events-list" class="space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl sm:text-2xl font-extrabold text-white">Event Terbaru & Populer</h2>
                    <p class="text-xs text-slate-400 font-light mt-0.5">Pilih event impian Anda dan dapatkan tiket resminya dalam hitungan detik.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @forelse($events as $event)
                    <div class="bg-slate-900 border border-slate-800 rounded-3xl overflow-hidden shadow-xl hover:border-emerald-500/50 transition group flex flex-col justify-between">
                        <div>
                            <!-- Event Poster Image -->
                            <div class="relative h-48 sm:h-56 bg-slate-800 overflow-hidden">
                                <img src="{{ $event->banner_image }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 bg-slate-950/80 backdrop-blur-md border border-slate-700 rounded-full text-[10px] font-black text-emerald-400 uppercase tracking-widest">
                                        📅 {{ $event->event_date->format('d M Y') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Event Info -->
                            <div class="p-6 space-y-3">
                                <h3 class="text-lg font-bold text-white leading-snug group-hover:text-emerald-400 transition">
                                    {{ $event->title }}
                                </h3>
                                <p class="text-xs text-slate-400 font-light line-clamp-2 leading-relaxed">
                                    {{ $event->description }}
                                </p>

                                <div class="flex items-center gap-2 text-xs text-slate-400 font-medium">
                                    <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                                    <span class="truncate">{{ $event->location_name }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Ticket Price & CTA -->
                        <div class="p-6 pt-0 border-t border-slate-800/80 flex items-center justify-between gap-3 mt-4">
                            <div>
                                <span class="text-[10px] text-slate-500 uppercase tracking-wider font-bold block">Mulai Dari</span>
                                <span class="text-base font-extrabold text-emerald-400">
                                    @php
                                        $minPrice = $event->ticketCategories->min('price');
                                    @endphp
                                    {{ $minPrice ? 'Rp ' . number_format($minPrice, 0, ',', '.') : 'GRATIS' }}
                                </span>
                            </div>
                            <a href="{{ route('events.show', $event->slug) }}" class="px-5 py-2.5 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl text-xs font-bold uppercase tracking-wider transition shadow-lg shadow-emerald-500/20">
                                Pesan Tiket 🎟️
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center text-slate-500 bg-slate-900 border border-slate-800 rounded-3xl">
                        <p class="text-base font-bold">Belum Ada Event Yang Diterbitkan.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Upsell Banner Box -->
        <div class="p-8 bg-slate-900 border border-slate-800 rounded-3xl flex flex-col sm:flex-row items-center justify-between gap-6">
            <div class="space-y-1">
                <span class="px-2.5 py-0.5 bg-amber-500/10 text-amber-400 border border-amber-500/20 rounded-full text-[10px] font-black uppercase tracking-wider">⚡ Feature Upsell Pro</span>
                <h3 class="text-base font-bold text-white">Ingin Kirim E-Tiket PDF Otomatis ke WhatsApp Pembeli?</h3>
                <p class="text-xs text-slate-400 font-light max-w-xl">
                    Integrasikan platform tiket Anda dengan WACentrix WA Gateway agar pembeli menerima E-Tiket PDF instan langsung ke nomor WhatsApp mereka begitu sukses checkout!
                </p>
            </div>
            <a href="https://wa.eshace.com" target="_blank" class="px-6 py-3 bg-amber-500 hover:bg-amber-600 text-slate-950 rounded-2xl text-xs font-extrabold uppercase tracking-wider transition whitespace-nowrap">
                Pelajari WACentrix WA Gateway 🚀
            </a>
        </div>
    </div>
</x-app-layout>
