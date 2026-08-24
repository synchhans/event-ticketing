<x-app-layout title="E-Tiket Digital {{ $ticket->ticket_code }} — EventPass">
    <div class="max-w-xl mx-auto px-4 space-y-8">
        
        <!-- Header Title -->
        <div class="text-center space-y-2">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 bg-emerald-500/10 border border-emerald-500/30 rounded-full">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="text-[10px] font-mono font-bold text-emerald-400 uppercase tracking-widest">E-Tiket Digital Resmi</span>
            </div>
            <h1 class="text-3xl font-heading font-black text-white">Tiket Masuk Event Anda</h1>
            <p class="text-xs text-slate-400 font-light">Tunjukkan QR Code di bawah ini kepada panitia gate venue untuk di-scan.</p>
        </div>

        <!-- Ticket Holographic Pass Card -->
        <div x-data="tiltCard()" @mousemove="onMouseMove($event)" @mouseleave="onMouseLeave()"
             :style="`transform: perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(${scale});`"
             class="glass-panel border border-emerald-500/30 rounded-[36px] overflow-hidden shadow-2xl relative glow-emerald transition-transform duration-200 ease-out preserve-3d">
            <!-- Dynamic Glare Light Sheen -->
            <div class="absolute inset-0 pointer-events-none rounded-[36px] transition-opacity duration-300 z-30"
                 :style="`background: radial-gradient(circle at ${glareX}% ${glareY}%, rgba(255,255,255,0.3) 0%, transparent 60%); opacity: ${glareOpacity};`"></div>
            <!-- Top Event Image Header -->
            <div class="h-36 w-full relative bg-slate-900">
                <img src="{{ $ticket->order->event->banner_image }}" alt="Event Banner" class="w-full h-full object-cover opacity-60">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                <div class="absolute bottom-4 left-6 right-6 flex items-center justify-between">
                    <span class="px-3 py-1 bg-emerald-500/20 backdrop-blur-md border border-emerald-500/30 rounded-full text-[10px] font-heading font-black text-emerald-300 uppercase tracking-wider">
                        {{ $ticket->category->name }}
                    </span>
                    <span class="text-xs font-mono font-black text-amber-400 tracking-wider">
                        {{ $ticket->ticket_code }}
                    </span>
                </div>
            </div>

            <!-- Ticket Body Info -->
            <div class="p-6 sm:p-8 space-y-6">
                <!-- Event Title & Date -->
                <div class="space-y-2">
                    <h2 class="text-xl font-heading font-bold text-white leading-tight">
                        {{ $ticket->order->event->title }}
                    </h2>
                    <div class="flex flex-wrap items-center gap-4 text-xs text-slate-300">
                        <div class="flex items-center gap-1.5 text-emerald-400 font-bold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 9v7.5"/></svg>
                            <span>{{ $ticket->order->event->event_date->format('d M Y • H:i') }} WIB</span>
                        </div>
                        <div class="flex items-center gap-1.5 text-slate-400">
                            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                            <span>{{ $ticket->order->event->location_name }}</span>
                        </div>
                    </div>
                </div>

                <!-- Perforated Stub Line -->
                <div class="relative py-2 flex items-center justify-center">
                    <div class="w-full border-t-2 border-dashed border-slate-800"></div>
                    <div class="absolute -left-11 w-8 h-8 rounded-full bg-slate-950 border border-slate-800"></div>
                    <div class="absolute -right-11 w-8 h-8 rounded-full bg-slate-950 border border-slate-800"></div>
                </div>

                <!-- QR Code Box -->
                <div class="flex flex-col items-center justify-center space-y-4 pt-2">
                    <div class="p-5 bg-white rounded-3xl shadow-2xl flex items-center justify-center border-4 border-emerald-500/40">
                        {!! $qrSvg !!}
                    </div>

                    <div class="text-center space-y-1">
                        <span class="text-[10px] text-slate-400 font-mono uppercase tracking-widest font-bold">Pemegang Tiket</span>
                        <h3 class="text-lg font-heading font-extrabold text-white">{{ $ticket->holder_name }}</h3>
                        <p class="text-xs font-mono text-slate-400">{{ $ticket->order->customer_email }}</p>
                    </div>

                    <!-- Ticket Status Badge -->
                    @if($ticket->status === 'used')
                        <div class="px-5 py-2.5 bg-rose-500/20 text-rose-400 border border-rose-500/40 rounded-2xl text-xs font-heading font-black uppercase tracking-wider flex items-center gap-2">
                            <svg class="w-4 h-4 text-rose-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                            <span>TIKET TELAH DI-SCAN (SUDAH DIPAKAI)</span>
                        </div>
                        <p class="text-[10px] text-slate-500 font-mono">Checked-in pada {{ $ticket->checked_in_at?->format('d M Y H:i:s') }}</p>
                    @else
                        <div class="px-5 py-2.5 bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 rounded-2xl text-xs font-heading font-black uppercase tracking-wider flex items-center gap-2 glow-emerald">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>TIKET VALID & AKTIF (READY FOR GATE)</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Bottom Actions Bar -->
            <div class="p-6 bg-slate-950/80 border-t border-slate-800 flex items-center justify-between gap-4">
                <a href="{{ route('tickets.pdf', $ticket->ticket_code) }}" target="_blank" rel="noopener noreferrer" class="px-6 py-3 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 text-white rounded-xl text-xs font-heading font-bold transition flex items-center gap-2 shadow-lg shadow-emerald-500/20">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231a1.125 1.125 0 01-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.085 48.085 0 00-14.326 0C3.768 7.441 3 8.375 3 9.456v6.294A2.25 2.25 0 005.25 18h1.091"/></svg>
                    <span>Cetak E-Tiket PDF</span>
                </a>

                <a href="{{ route('home') }}" class="text-xs text-emerald-400 font-bold hover:underline flex items-center gap-1">
                    <span>Kembali ke Event</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                </a>
            </div>
        </div>

    </div>
</x-app-layout>
