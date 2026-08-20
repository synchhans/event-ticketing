<x-app-layout title="Admin SH God Mode Control — EventPass">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <span class="px-3 py-1 bg-amber-500/10 text-amber-400 border border-amber-500/30 rounded-full text-[10px] font-black uppercase tracking-widest">
                    👑 SH God Mode Event Control
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white mt-2">Dashboard Administrator & Attendance Tracker</h1>
                <p class="text-xs text-slate-400 font-light mt-0.5">Kelola event, terbitkan kuota tiket, dan pantau persentase kehadiran gate secara real-time.</p>
            </div>
        </div>

        <!-- Metric Stat Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-6 bg-slate-900 border border-slate-800 rounded-3xl space-y-2">
                <span class="text-[10px] text-slate-400 font-extrabold uppercase tracking-wider">Total Event Terbit</span>
                <h2 class="text-3xl font-black text-white">{{ $events->count() }} Event</h2>
                <p class="text-[10px] text-emerald-400 font-bold">Aktif & Berjalan</p>
            </div>

            <div class="p-6 bg-slate-900 border border-slate-800 rounded-3xl space-y-2">
                <span class="text-[10px] text-slate-400 font-extrabold uppercase tracking-wider">Total Omset Penjualan</span>
                <h2 class="text-2xl font-black text-emerald-400">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h2>
                <p class="text-[10px] text-slate-500">Lunas terverifikasi</p>
            </div>

            <div class="p-6 bg-slate-900 border border-slate-800 rounded-3xl space-y-2">
                <span class="text-[10px] text-slate-400 font-extrabold uppercase tracking-wider">Total Tiket Diterbitkan</span>
                <h2 class="text-3xl font-black text-white">{{ $totalIssued }} Tiket</h2>
                <p class="text-[10px] text-slate-500">Dengan QR Code Unik</p>
            </div>

            <div class="p-6 bg-slate-900 border border-slate-800 rounded-3xl space-y-2">
                <span class="text-[10px] text-slate-400 font-extrabold uppercase tracking-wider">Persentase Kehadiran Gate</span>
                <h2 class="text-3xl font-black text-emerald-400">{{ $checkinPercentage }}%</h2>
                <p class="text-[10px] text-slate-400 font-bold">{{ $totalUsed }} / {{ $totalIssued }} Pengunjung Hadir</p>
            </div>
        </div>

        <!-- Inline Form: Create New Event -->
        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 sm:p-8 space-y-6 shadow-xl" x-data="{ createEventForm: false }">
            <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                <div>
                    <span class="text-[10px] text-emerald-400 font-bold uppercase tracking-wider">Manajemen Event</span>
                    <h3 class="text-lg font-bold text-white">Buat & Terbitkan Event Baru</h3>
                </div>
                <button @click="createEventForm = !createEventForm" class="px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl text-xs font-bold transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                    <span x-text="createEventForm ? 'Tutup Form' : '+ Buat Event Baru'"></span>
                </button>
            </div>

            <div x-show="createEventForm" class="p-6 bg-slate-950 border border-slate-800 rounded-2xl space-y-4" style="display: none;">
                <form action="{{ route('admin.events.store') }}" method="POST" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @csrf
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Judul Event / Konser:</label>
                        <input type="text" name="title" required placeholder="Contoh: Metal Fest 2026" class="w-full bg-slate-900 border border-slate-800 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-emerald-500">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Tanggal & Jam Acara:</label>
                        <input type="datetime-local" name="event_date" required class="w-full bg-slate-900 border border-slate-800 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-emerald-500">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Nama Lokasi Venue:</label>
                        <input type="text" name="location_name" required placeholder="Contoh: Istora Senayan, Jakarta" class="w-full bg-slate-900 border border-slate-800 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-emerald-500">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Kategori Tiket Utama:</label>
                        <input type="text" name="category_name" required value="Presale Ticket" class="w-full bg-slate-900 border border-slate-800 rounded-xl px-3 py-2 text-xs text-emerald-400 font-bold focus:outline-none focus:border-emerald-500">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Harga Tiket (Rp):</label>
                        <input type="number" name="category_price" required value="150000" min="0" class="w-full bg-slate-900 border border-slate-800 rounded-xl px-3 py-2 text-xs text-white font-bold focus:outline-none focus:border-emerald-500">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Kuota Tiket Diterbitkan:</label>
                        <input type="number" name="category_quota" required value="100" min="1" class="w-full bg-slate-900 border border-slate-800 rounded-xl px-3 py-2 text-xs text-white font-bold focus:outline-none focus:border-emerald-500">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Deskripsi Acara:</label>
                        <input type="text" name="description" required placeholder="Deskripsi singkat mengenai event..." class="w-full bg-slate-900 border border-slate-800 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-emerald-500">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">URL Banner Poster Image (Opsional):</label>
                        <input type="url" name="banner_image" placeholder="https://images.unsplash.com/..." class="w-full bg-slate-900 border border-slate-800 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-emerald-500">
                    </div>

                    <div class="sm:col-span-3 pt-2">
                        <button type="submit" class="w-full py-2.5 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl text-xs font-bold uppercase tracking-wider transition">
                            + Simpan & Terbitkan Event 🚀
                        </button>
                    </div>
                </form>
            </div>

            <!-- List of Events Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-300">
                    <thead class="bg-slate-950 text-slate-400 uppercase text-[10px] tracking-wider border-b border-slate-800">
                        <tr>
                            <th class="py-3 px-4 font-bold">Judul Event</th>
                            <th class="py-3 px-4 font-bold">Tanggal Event</th>
                            <th class="py-3 px-4 font-bold">Lokasi Venue</th>
                            <th class="py-3 px-4 font-bold">Kategori Tiket</th>
                            <th class="py-3 px-4 font-bold text-right">Aksi Admin</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800">
                        @foreach($events as $e)
                            <tr class="hover:bg-slate-950/50 transition">
                                <td class="py-3.5 px-4 font-bold text-white leading-snug">
                                    {{ $e->title }}
                                </td>
                                <td class="py-3.5 px-4 font-mono text-emerald-400">
                                    {{ $e->event_date->format('d M Y H:i') }}
                                </td>
                                <td class="py-3.5 px-4 text-slate-400">
                                    {{ $e->location_name }}
                                </td>
                                <td class="py-3.5 px-4 font-bold">
                                    {{ $e->ticketCategories->pluck('name')->join(', ') }}
                                </td>
                                <td class="py-3.5 px-4 text-right">
                                    <a href="{{ route('admin.events.export', $e->id) }}" class="px-3 py-1.5 bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 rounded-lg text-[10px] font-bold uppercase hover:bg-emerald-500 hover:text-white transition inline-flex items-center gap-1">
                                        <span>Ekspor CSV Peserta 📥</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Issued Tickets & Check-in Feed Table -->
        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 sm:p-8 space-y-4 shadow-xl">
            <h3 class="text-sm font-bold text-white uppercase tracking-wider border-b border-slate-800 pb-3">
                Daftar Tiket Terbit & Status Gate Checker
            </h3>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-300">
                    <thead class="bg-slate-950 text-slate-400 uppercase text-[10px] tracking-wider border-b border-slate-800">
                        <tr>
                            <th class="py-3 px-4 font-bold">Kode Tiket</th>
                            <th class="py-3 px-4 font-bold">Nama Pemegang</th>
                            <th class="py-3 px-4 font-bold">Event & Kategori</th>
                            <th class="py-3 px-4 font-bold">Status Gate</th>
                            <th class="py-3 px-4 font-bold">Waktu Check-in</th>
                            <th class="py-3 px-4 font-bold text-right">Panitia Gate</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800">
                        @foreach($recentTickets as $t)
                            <tr class="hover:bg-slate-950/50 transition">
                                <td class="py-3 px-4 font-mono font-bold text-amber-400">
                                    <a href="{{ route('tickets.show', $t->ticket_code) }}" target="_blank" class="hover:underline">
                                        {{ $t->ticket_code }}
                                    </a>
                                </td>
                                <td class="py-3 px-4 font-bold text-white">
                                    {{ $t->holder_name }}
                                </td>
                                <td class="py-3 px-4">
                                    <span class="text-white font-bold block">{{ $t->order->event->title ?? '-' }}</span>
                                    <span class="text-[10px] text-slate-400">{{ $t->category->name ?? '-' }}</span>
                                </td>
                                <td class="py-3 px-4">
                                    @if($t->status === 'used')
                                        <span class="px-2.5 py-0.5 rounded-full text-[9px] font-black uppercase bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">
                                            VERIFIED / HADIR 🟢
                                        </span>
                                    @else
                                        <span class="px-2.5 py-0.5 rounded-full text-[9px] font-black uppercase bg-slate-800 text-slate-400">
                                            BELUM CHECK-IN
                                        </span>
                                    @endif
                                </td>
                                <td class="py-3 px-4 font-mono text-slate-400">
                                    {{ $t->checked_in_at ? $t->checked_in_at->format('d/m/Y H:i:s') : '-' }}
                                </td>
                                <td class="py-3 px-4 text-right text-slate-400">
                                    {{ $t->checkedInUser->name ?? '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pt-2">
                {{ $recentTickets->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
