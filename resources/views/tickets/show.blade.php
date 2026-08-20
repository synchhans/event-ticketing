<x-app-layout title="E-Tiket Digital {{ $ticket->ticket_code }} — EventPass">
    <div class="max-w-2xl mx-auto px-4 space-y-8">
        <!-- Top Title -->
        <div class="text-center space-y-2">
            <span class="px-3.5 py-1 bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 rounded-full text-[10px] font-black uppercase tracking-widest">
                🎟️ E-Tiket Resmi EventPass
            </span>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white">Tiket Masuk Digital Anda</h1>
            <p class="text-xs text-slate-400 font-light">Tunjukkan QR Code di bawah ini kepada panitia gate venue untuk di-scan.</p>
        </div>

        <!-- Ticket Card Sultan Design -->
        <div class="bg-gradient-to-b from-slate-900 via-slate-900 to-slate-950 border border-slate-800 rounded-[32px] overflow-hidden shadow-2xl relative">
            <!-- Top Banner -->
            <div class="h-32 w-full relative bg-slate-800">
                <img src="{{ $ticket->order->event->banner_image }}" alt="Event Banner" class="w-full h-full object-cover opacity-60">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
                <div class="absolute bottom-4 left-6 right-6 flex items-center justify-between">
                    <span class="px-3 py-1 bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 rounded-full text-[10px] font-black uppercase tracking-wider">
                        {{ $ticket->category->name }}
                    </span>
                    <span class="text-xs font-mono font-black text-amber-400">
                        {{ $ticket->ticket_code }}
                    </span>
                </div>
            </div>

            <!-- Body Info -->
            <div class="p-6 sm:p-8 space-y-6">
                <!-- Event Title & Date -->
                <div class="space-y-2">
                    <h2 class="text-xl font-bold text-white leading-tight">
                        {{ $ticket->order->event->title }}
                    </h2>
                    <div class="flex flex-wrap items-center gap-4 text-xs text-slate-400">
                        <div class="flex items-center gap-1.5 text-emerald-400 font-bold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 9v7.5"/></svg>
                            <span>{{ $ticket->order->event->event_date->format('d M Y • H:i') }} WIB</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                            <span>{{ $ticket->order->event->location_name }}</span>
                        </div>
                    </div>
                </div>

                <!-- Stub Divider Line -->
                <div class="relative py-2 flex items-center justify-center">
                    <div class="w-full border-t-2 border-dashed border-slate-800"></div>
                    <div class="absolute -left-10 w-8 h-8 rounded-full bg-slate-950 border border-slate-800"></div>
                    <div class="absolute -right-10 w-8 h-8 rounded-full bg-slate-950 border border-slate-800"></div>
                </div>

                <!-- QR Code Box -->
                <div class="flex flex-col items-center justify-center space-y-4 pt-2">
                    <div class="p-4 bg-white rounded-3xl shadow-xl flex items-center justify-center border-4 border-emerald-500/30">
                        {!! $qrSvg !!}
                    </div>

                    <div class="text-center space-y-1">
                        <span class="text-[10px] text-slate-400 uppercase tracking-widest font-bold">Nama Pemegang Tiket</span>
                        <h3 class="text-lg font-extrabold text-white">{{ $ticket->holder_name }}</h3>
                        <p class="text-xs font-mono text-slate-400">{{ $ticket->order->customer_email }}</p>
                    </div>

                    <!-- Ticket Status Badge -->
                    @if($ticket->status === 'used')
                        <div class="px-4 py-2 bg-rose-500/20 text-rose-400 border border-rose-500/30 rounded-2xl text-xs font-black uppercase tracking-wider flex items-center gap-2">
                            <span>🛑 TIKET TELAH DI-SCAN (SUDAH DIPAKAI)</span>
                        </div>
                        <p class="text-[10px] text-slate-500">Checked-in pada {{ $ticket->checked_in_at?->format('d M Y H:i:s') }}</p>
                    @else
                        <div class="px-4 py-2 bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 rounded-2xl text-xs font-black uppercase tracking-wider flex items-center gap-2">
                            <span>🟢 TIKET VALID & AKTIF (READY FOR GATE)</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Actions Bar -->
            <div class="p-6 bg-slate-950/60 border-t border-slate-800 flex items-center justify-between">
                <a href="{{ route('tickets.pdf', $ticket->ticket_code) }}" target="_blank" class="px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-white rounded-xl text-xs font-bold transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231a1.125 1.125 0 01-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.085 48.085 0 00-14.326 0C3.768 7.441 3 8.375 3 9.456v6.294A2.25 2.25 0 005.25 18h1.091"/></svg>
                    <span>Cetak E-Tiket PDF</span>
                </a>

                <a href="{{ route('home') }}" class="text-xs text-emerald-400 font-bold hover:underline">
                    Kembali ke Event &rarr;
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
