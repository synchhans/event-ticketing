<x-app-layout title="{{ $event->title }} — EventPass">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12" x-data="{ checkoutModal: false, selectedCategory: null, quantity: 1 }">
        
        <!-- Event Hero Header -->
        <div class="relative rounded-[36px] overflow-hidden glass-panel border border-slate-800 shadow-2xl">
            <div class="h-72 sm:h-[420px] w-full relative">
                <img src="{{ $event->banner_image }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/70 to-transparent"></div>
            </div>

            <div class="relative p-6 sm:p-12 -mt-28 space-y-5">
                <div class="flex flex-wrap items-center gap-3">
                    <span class="px-4 py-1.5 bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 backdrop-blur-md rounded-full text-[10px] font-mono font-bold tracking-wider flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 9v7.5"/></svg>
                        <span>{{ $event->event_date->format('d M Y • H:i') }} WIB</span>
                    </span>
                    <span class="px-4 py-1.5 bg-slate-900/80 text-slate-300 border border-slate-700 backdrop-blur-md rounded-full text-[10px] font-bold uppercase tracking-wider">
                        Organized by {{ $event->organizer->name ?? 'CodeWorshipper EO' }}
                    </span>
                </div>

                <h1 class="text-3xl sm:text-5xl font-heading font-black text-white leading-tight">
                    {{ $event->title }}
                </h1>

                <div class="flex flex-wrap items-center gap-6 text-xs text-slate-300">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                        <span>{{ $event->location_name }}</span>
                    </div>

                    @if($event->google_maps_url)
                        <a href="{{ $event->google_maps_url }}" target="_blank" rel="noopener noreferrer" class="text-emerald-400 font-bold hover:underline flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503-12.486l-4.243 2.122a2.25 2.25 0 01-2.02 0L5.003 4.764A2.25 2.25 0 002.25 6.764v10.472a2.25 2.25 0 001.243 2.016l4.243 2.122a2.25 2.25 0 002.02 0l4.243-2.122a2.25 2.25 0 012.02 0l4.243 2.122a2.25 2.25 0 002.757-2.016V6.764a2.25 2.25 0 00-1.243-2.016l-4.243-2.122a2.25 2.25 0 00-2.02 0z"/></svg>
                            <span>Buka Google Maps</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Layout Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <!-- Left Column: Description & Instructions -->
            <div class="lg:col-span-7 space-y-8">
                <!-- Description Box -->
                <div class="glass-card rounded-3xl p-6 sm:p-8 space-y-4">
                    <h3 class="text-base font-heading font-bold text-white uppercase tracking-wider border-b border-slate-800 pb-3">Deskripsi Acara</h3>
                    <div class="text-xs sm:text-sm text-slate-300 font-light leading-relaxed whitespace-pre-line">
                        {{ $event->description }}
                    </div>
                </div>

                <!-- Gate Check-in Instructions -->
                <div class="p-6 bg-emerald-950/20 border border-emerald-500/20 rounded-3xl space-y-3">
                    <h4 class="text-xs font-heading font-bold text-emerald-400 uppercase tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12v-.008z"/></svg>
                        <span>Instruksi Masuk Gate Venue:</span>
                    </h4>
                    <ul class="text-xs text-slate-300 space-y-2 list-disc list-inside font-light leading-relaxed">
                        <li>Tunjukkan E-Tiket Digital (QR Code) melalui layar HP Anda kepada panitia di pintu masuk gate.</li>
                        <li>Panitia akan melakukan scan QR Code secara otomatis menggunakan Kamera Scanner.</li>
                        <li>Satu QR Code hanya dapat di-scan 1 (satu) kali. QR Code yang sudah di-scan tidak dapat dipindahtangankan.</li>
                    </ul>
                </div>
            </div>

            <!-- Right Column: Ticket Category Tiers -->
            <div class="lg:col-span-5 space-y-6">
                <div class="glass-panel rounded-3xl p-6 sm:p-8 space-y-6 shadow-2xl sticky top-24 border border-slate-800">
                    <h3 class="text-lg font-heading font-bold text-white border-b border-slate-800 pb-4">Pilih Kategori Tiket</h3>

                    <div class="space-y-4">
                        @foreach($event->ticketCategories as $cat)
                            <div class="p-5 bg-slate-950/80 border border-slate-800 rounded-2xl space-y-4 hover:border-emerald-500/40 transition duration-300">
                                <div class="flex items-start justify-between gap-3">
                                    <div class="space-y-1">
                                        <h4 class="text-sm font-heading font-bold text-white leading-tight">{{ $cat->name }}</h4>
                                        <p class="text-[11px] text-slate-400 font-light leading-snug">{{ $cat->description }}</p>
                                    </div>
                                    <span class="text-base font-heading font-black text-emerald-400 shrink-0">
                                        Rp {{ number_format($cat->price, 0, ',', '.') }}
                                    </span>
                                </div>

                                <div class="flex items-center justify-between pt-3 border-t border-slate-800/80">
                                    <span class="text-[10px] font-mono font-bold uppercase {{ $cat->available_count > 0 ? 'text-emerald-400' : 'text-rose-500' }}">
                                        Sisa: {{ $cat->available_count }} / {{ $cat->quota }} Tiket
                                    </span>

                                    @if($cat->available_count > 0)
                                        <button @click="checkoutModal = true; selectedCategory = {{ json_encode($cat) }}; quantity = 1" class="px-5 py-2.5 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 text-white rounded-xl text-xs font-heading font-bold uppercase tracking-wider transition shadow-lg shadow-emerald-500/20 flex items-center gap-1.5">
                                            <span>Pesan Tiket</span>
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-12v.75m0 3v.75m0 3v.75m0 3V18m-3-12h18c.621 0 1.125.504 1.125 1.125v11.75c0 .621-.504 1.125-1.125 1.125H3c-.621 0-1.125-.504-1.125-1.125V7.125C1.875 6.504 2.379 6 3 6z"/></svg>
                                        </button>
                                    @else
                                        <span class="px-3.5 py-1.5 bg-slate-900 text-slate-500 rounded-xl text-[10px] font-bold uppercase">Habis</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Checkout Form Modal -->
        <div x-show="checkoutModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-xl" style="display: none;" x-transition>
            <div @click.away="checkoutModal = false" class="glass-panel border border-slate-800 rounded-[32px] p-6 sm:p-10 max-w-lg w-full text-white shadow-2xl space-y-6">
                <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                    <div>
                        <span class="text-[10px] text-emerald-400 font-mono font-bold uppercase tracking-wider">Form Pemesanan Tiket</span>
                        <h3 class="text-lg font-heading font-bold text-white" x-text="selectedCategory ? selectedCategory.name : ''"></h3>
                    </div>
                    <button @click="checkoutModal = false" class="text-slate-400 hover:text-white text-2xl font-bold">&times;</button>
                </div>

                <form :action="'/event/{{ $event->slug }}/checkout'" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="ticket_category_id" :value="selectedCategory ? selectedCategory.id : ''">

                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">Jumlah Tiket:</label>
                        <select name="quantity" x-model="quantity" required class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-xs font-bold text-emerald-400 focus:outline-none focus:border-emerald-500">
                            <option value="1">1 Tiket</option>
                            <option value="2">2 Tiket</option>
                            <option value="3">3 Tiket</option>
                            <option value="4">4 Tiket</option>
                            <option value="5">5 Tiket</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">Nama Lengkap Pemesan:</label>
                        <input type="text" name="customer_name" required value="{{ auth()->user()?->name }}" placeholder="Contoh: Budi Santoso" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-xs text-white focus:outline-none focus:border-emerald-500">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">Email Pengirim E-Tiket:</label>
                        <input type="email" name="customer_email" required value="{{ auth()->user()?->email }}" placeholder="budi@example.com" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-xs text-white focus:outline-none focus:border-emerald-500">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">Nomor WhatsApp / HP:</label>
                        <input type="text" name="customer_phone" required placeholder="081234567890" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-xs font-mono text-white focus:outline-none focus:border-emerald-500">
                    </div>

                    <!-- Total Price Calculation Breakdown -->
                    <div class="p-4 bg-slate-950/90 border border-slate-800 rounded-2xl flex items-center justify-between">
                        <span class="text-xs text-slate-400 font-bold uppercase">Total Bayar:</span>
                        <span class="text-lg font-heading font-black text-emerald-400" x-text="selectedCategory ? 'Rp ' + new Intl.NumberFormat('id-ID').format(selectedCategory.price * quantity) : ''"></span>
                    </div>

                    <div class="pt-2 flex items-center justify-end gap-3">
                        <button type="button" @click="checkoutModal = false" class="px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-xl text-xs font-bold">Batal</button>
                        <button type="submit" class="px-7 py-3 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 text-white rounded-xl text-xs font-heading font-bold uppercase tracking-wider transition shadow-lg shadow-emerald-500/20 flex items-center gap-2">
                            <span>Konfirmasi Tiket</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>
