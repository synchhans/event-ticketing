<x-app-layout title="{{ $event->title }} — EventPass">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10" x-data="{ checkoutModal: false, selectedCategory: null }">
        <!-- Event Header Banner -->
        <div class="relative rounded-[32px] overflow-hidden bg-slate-900 border border-slate-800 shadow-2xl">
            <div class="h-64 sm:h-96 w-full relative">
                <img src="{{ $event->banner_image }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/60 to-transparent"></div>
            </div>

            <div class="relative p-6 sm:p-10 -mt-24 space-y-4">
                <div class="flex flex-wrap items-center gap-3">
                    <span class="px-3.5 py-1 bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 rounded-full text-[10px] font-black uppercase tracking-widest">
                        📅 {{ $event->event_date->format('d M Y • H:i') }} WIB
                    </span>
                    <span class="px-3.5 py-1 bg-slate-800 text-slate-300 rounded-full text-[10px] font-bold uppercase tracking-widest">
                        Organized by {{ $event->organizer->name ?? 'CodeWorshipper EO' }}
                    </span>
                </div>

                <h1 class="text-2xl sm:text-4xl font-extrabold text-white leading-tight">
                    {{ $event->title }}
                </h1>

                <div class="flex flex-wrap items-center gap-6 text-xs text-slate-300">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                        <span>{{ $event->location_name }}</span>
                    </div>

                    @if($event->google_maps_url)
                        <a href="{{ $event->google_maps_url }}" target="_blank" class="text-emerald-400 hover:underline font-bold flex items-center gap-1">
                            <span>Buka Google Maps 🗺️</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            <!-- Left 2 Columns: Description & Details -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Description Box -->
                <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 sm:p-8 space-y-4">
                    <h3 class="text-base font-bold text-white uppercase tracking-wider">Deskripsi & Detail Acara</h3>
                    <div class="text-xs sm:text-sm text-slate-300 font-light leading-relaxed whitespace-pre-line">
                        {{ $event->description }}
                    </div>
                </div>

                <!-- Gate Information Box -->
                <div class="p-6 bg-slate-900/60 border border-slate-800 rounded-3xl space-y-3">
                    <h4 class="text-xs font-bold text-slate-200 uppercase tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12v-.008z"/></svg>
                        <span>Instruksi Masuk Gate Venue:</span>
                    </h4>
                    <ul class="text-xs text-slate-400 space-y-1.5 list-disc list-inside font-light">
                        <li>Tunjukkan E-Tiket Digital (QR Code) melalui layar HP Anda kepada panitia di pintu masuk gate.</li>
                        <li>Panitia akan melakukan scan QR Code secara otomatis.</li>
                        <li>Satu QR Code hanya dapat di-scan 1 (satu) kali. QR Code yang sudah dipakai tidak dapat dipindahtangankan.</li>
                    </ul>
                </div>
            </div>

            <!-- Right Column: Ticket Categories Tiers -->
            <div class="space-y-6">
                <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 space-y-6 shadow-xl sticky top-24">
                    <h3 class="text-base font-bold text-white border-b border-slate-800 pb-3">Pilih Kategori Tiket</h3>

                    <div class="space-y-4">
                        @foreach($event->ticketCategories as $cat)
                            <div class="p-5 bg-slate-950 border border-slate-800 rounded-2xl space-y-3 hover:border-emerald-500/50 transition">
                                <div class="flex items-start justify-between gap-2">
                                    <div>
                                        <h4 class="text-xs font-extrabold text-white">{{ $cat->name }}</h4>
                                        <span class="text-[10px] text-slate-400 font-light">{{ $cat->description }}</span>
                                    </div>
                                    <span class="text-sm font-black text-emerald-400 shrink-0">
                                        Rp {{ number_format($cat->price, 0, ',', '.') }}
                                    </span>
                                </div>

                                <div class="flex items-center justify-between pt-2 border-t border-slate-800/80">
                                    <span class="text-[10px] font-bold uppercase {{ $cat->available_count > 0 ? 'text-emerald-400' : 'text-rose-500' }}">
                                        Sisa: {{ $cat->available_count }} / {{ $cat->quota }} Tiket
                                    </span>

                                    @if($cat->available_count > 0)
                                        <button @click="checkoutModal = true; selectedCategory = {{ json_encode($cat) }}" class="px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl text-xs font-bold uppercase tracking-wider transition shadow-md shadow-emerald-500/20">
                                            Pesan 🎟️
                                        </button>
                                    @else
                                        <span class="px-3 py-1 bg-slate-800 text-slate-500 rounded-lg text-[10px] font-bold uppercase">Habis</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Checkout Form Modal -->
        <div x-show="checkoutModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-md" style="display: none;">
            <div @click.away="checkoutModal = false" class="bg-slate-900 border border-slate-800 rounded-3xl p-6 sm:p-8 max-w-lg w-full text-white shadow-2xl space-y-6">
                <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                    <div>
                        <span class="text-[10px] text-emerald-400 font-bold uppercase tracking-wider">Form Pemesanan Tiket</span>
                        <h3 class="text-base font-bold text-white" x-text="selectedCategory ? selectedCategory.name : ''"></h3>
                    </div>
                    <button @click="checkoutModal = false" class="text-slate-400 hover:text-white text-xl">&times;</button>
                </div>

                <form :action="'/event/{{ $event->slug }}/checkout'" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="ticket_category_id" :value="selectedCategory ? selectedCategory.id : ''">

                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Jumlah Tiket:</label>
                        <select name="quantity" required class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-xs font-bold text-emerald-400 focus:outline-none focus:border-emerald-500">
                            <option value="1">1 Tiket</option>
                            <option value="2">2 Tiket</option>
                            <option value="3">3 Tiket</option>
                            <option value="4">4 Tiket</option>
                            <option value="5">5 Tiket</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Nama Lengkap Pemesan:</label>
                        <input type="text" name="customer_name" required value="{{ auth()->user()?->name }}" placeholder="Contoh: Budi Santoso" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-xs text-white focus:outline-none focus:border-emerald-500">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Email Pengirim E-Tiket:</label>
                        <input type="email" name="customer_email" required value="{{ auth()->user()?->email }}" placeholder="budi@example.com" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-xs text-white focus:outline-none focus:border-emerald-500">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1">Nomor WhatsApp / HP:</label>
                        <input type="text" name="customer_phone" required placeholder="081234567890" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-xs font-mono text-white focus:outline-none focus:border-emerald-500">
                    </div>

                    <div class="pt-4 border-t border-slate-800 flex items-center justify-between">
                        <button type="button" @click="checkoutModal = false" class="px-5 py-2.5 bg-slate-800 text-slate-300 rounded-xl text-xs font-bold">Batal</button>
                        <button type="submit" class="px-6 py-2.5 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl text-xs font-bold uppercase tracking-wider transition shadow-lg shadow-emerald-500/20">
                            Konfirmasi & Dapatkan Tiket 🚀
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
