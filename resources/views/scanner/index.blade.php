<x-app-layout title="Gate Pass QR Scanner — EventPass">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8" x-data="scannerApp()">
        <!-- Header Banner -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 p-6 sm:p-8 bg-slate-900 border border-slate-800 rounded-3xl shadow-xl">
            <div>
                <span class="px-3 py-1 bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 rounded-full text-[10px] font-black uppercase tracking-widest">
                    📱 Gatekeeper Real-time Scanner
                </span>
                <h1 class="text-2xl font-extrabold text-white mt-2">Aplikasi Scanner Gate Pintu Masuk</h1>
                <p class="text-xs text-slate-400 font-light mt-1">Arahkan kamera HP/Webcam ke QR Code E-Tiket pengunjung untuk verifikasi otomatis.</p>
            </div>

            <!-- Select Active Event -->
            <div class="w-full sm:w-auto space-y-1">
                <label class="block text-[10px] text-slate-400 font-bold uppercase tracking-wider">Pilih Event Gate:</label>
                <select x-model="selectedEventId" @change="changeEvent()" class="w-full sm:w-64 bg-slate-950 border border-slate-800 rounded-xl px-3 py-2 text-xs font-bold text-emerald-400 focus:outline-none focus:border-emerald-500">
                    @foreach($events as $e)
                        <option value="{{ $e->id }}" {{ $e->id == $selectedEventId ? 'selected' : '' }}>
                            {{ $e->title }} ({{ $e->event_date->format('d M Y') }})
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Verification Result Banner Alert -->
        <div x-show="scanResult" class="p-6 sm:p-8 rounded-3xl text-white shadow-2xl transition-all duration-300 space-y-3" :class="scanResultStatus === 'valid' ? 'bg-emerald-600' : 'bg-rose-600'" style="display: none;">
            <div class="flex items-center justify-between">
                <h2 class="text-xl sm:text-2xl font-black uppercase tracking-wide flex items-center gap-3">
                    <span x-text="scanResultStatus === 'valid' ? '🟢' : '🛑'"></span>
                    <span x-text="scanResultTitle"></span>
                </h2>
                <button @click="scanResult = false" class="text-white/80 hover:text-white text-2xl font-bold">&times;</button>
            </div>
            <p class="text-xs sm:text-sm font-medium opacity-90" x-text="scanResultMessage"></p>

            <template x-if="scannedTicket">
                <div class="pt-4 border-t border-white/20 grid grid-cols-2 sm:grid-cols-4 gap-4 text-xs">
                    <div>
                        <span class="text-[10px] uppercase opacity-75 font-bold block">Nama Pengunjung:</span>
                        <span class="font-extrabold text-sm" x-text="scannedTicket.holder_name"></span>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase opacity-75 font-bold block">Kategori Tiket:</span>
                        <span class="font-extrabold" x-text="scannedTicket.category_name"></span>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase opacity-75 font-bold block">Kode Tiket:</span>
                        <span class="font-mono font-bold" x-text="scannedTicket.ticket_code"></span>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase opacity-75 font-bold block">Status Gate:</span>
                        <span class="font-extrabold uppercase" x-text="scannedTicket.status"></span>
                    </div>
                </div>
            </template>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
            <!-- Left Column: Camera Scanner Container -->
            <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 space-y-6 shadow-xl">
                <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                    <h3 class="text-sm font-bold text-white uppercase tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z"/><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z"/></svg>
                        <span>Kamera Scanner Real-time</span>
                    </h3>

                    <div class="flex items-center gap-2">
                        <button @click="startScanner()" x-show="!scannerActive" class="px-3 py-1.5 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl text-xs font-bold transition">
                            Nyalakan Kamera 📷
                        </button>
                        <button @click="stopScanner()" x-show="scannerActive" class="px-3 py-1.5 bg-rose-500 hover:bg-rose-600 text-white rounded-xl text-xs font-bold transition" style="display: none;">
                            Matikan Kamera 🛑
                        </button>
                    </div>
                </div>

                <!-- HTML5 QR Reader Container -->
                <div class="relative min-h-[300px] bg-slate-950 rounded-2xl overflow-hidden border border-slate-800 flex items-center justify-center">
                    <div id="reader" class="w-full"></div>
                    <div x-show="!scannerActive" class="text-center p-8 space-y-2 text-slate-500">
                        <svg class="w-12 h-12 mx-auto text-slate-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5zM13.5 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5z"/></svg>
                        <p class="text-xs font-bold text-slate-400">Klik "Nyalakan Kamera" untuk mulai memindai QR E-Tiket</p>
                    </div>
                </div>

                <!-- Manual Input Fallback Form -->
                <div class="pt-4 border-t border-slate-800 space-y-3">
                    <h4 class="text-xs font-bold text-slate-300 uppercase tracking-wider">Input Manual (Jika Layar HP Pengunjung Bermasalah):</h4>
                    <form @submit.prevent="submitManualToken()" class="flex gap-2">
                        <input type="text" x-model="manualToken" placeholder="Masukkan Kode Tiket (misal: TKT-2026-0001) atau QR Token" required class="flex-1 bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-xs font-mono uppercase font-bold text-emerald-400 focus:outline-none focus:border-emerald-500">
                        <button type="submit" class="px-5 py-2.5 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl text-xs font-bold uppercase transition">
                            Cek Gate &rarr;
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Column: Recent Verified Check-ins Feed -->
            <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 space-y-4 shadow-xl">
                <h3 class="text-sm font-bold text-white uppercase tracking-wider flex items-center justify-between border-b border-slate-800 pb-3">
                    <span>Feed Pengunjung Masuk (Check-in Live)</span>
                    <span class="px-2 py-0.5 bg-emerald-500/10 text-emerald-400 rounded-full text-[10px] font-mono font-bold">{{ $recentCheckins->count() }} Pengunjung</span>
                </h3>

                <div class="space-y-3 max-h-[480px] overflow-y-auto pr-1">
                    @forelse($recentCheckins as $t)
                        <div class="p-3.5 bg-slate-950 border border-slate-800 rounded-2xl flex items-center justify-between gap-3">
                            <div class="space-y-0.5 truncate">
                                <h4 class="text-xs font-bold text-white truncate">{{ $t->holder_name }}</h4>
                                <div class="flex items-center gap-2 text-[10px] text-slate-400">
                                    <span class="text-emerald-400 font-mono font-bold">{{ $t->ticket_code }}</span>
                                    <span>•</span>
                                    <span>{{ $t->category->name }}</span>
                                </div>
                            </div>
                            <div class="text-right shrink-0 space-y-0.5">
                                <span class="px-2 py-0.5 bg-emerald-500/20 text-emerald-400 rounded text-[9px] font-black uppercase">CHECKED-IN</span>
                                <p class="text-[9px] text-slate-500 font-mono">{{ $t->checked_in_at?->format('H:i:s') }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="py-12 text-center text-slate-500 text-xs font-light">
                            Belum ada pengunjung yang terverifikasi check-in di gate.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- HTML5 QR Scanner CDN Library -->
    <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>

    <script>
        function scannerApp() {
            return {
                selectedEventId: '{{ $selectedEventId }}',
                manualToken: '',
                scannerActive: false,
                html5QrCode: null,
                isProcessing: false,
                scanResult: false,
                scanResultStatus: '',
                scanResultTitle: '',
                scanResultMessage: '',
                scannedTicket: null,

                changeEvent() {
                    window.location.href = '/scanner?event_id=' + this.selectedEventId;
                },

                startScanner() {
                    if (this.scannerActive) return;
                    this.scannerActive = true;

                    this.$nextTick(() => {
                        this.html5QrCode = new Html5Qrcode("reader");
                        this.html5QrCode.start(
                            { facingMode: "environment" },
                            { fps: 10, qrbox: { width: 250, height: 250 } },
                            (decodedText) => {
                                if (!this.isProcessing) {
                                    this.verifyToken(decodedText);
                                }
                            },
                            (errorMessage) => {
                                // Scan continuous frame - suppress console noise
                            }
                        ).catch(err => {
                            console.error("Camera access failed:", err);
                            alert("Gagal mengakses kamera: " + err);
                            this.scannerActive = false;
                        });
                    });
                },

                stopScanner() {
                    if (this.html5QrCode && this.scannerActive) {
                        this.html5QrCode.stop().then(() => {
                            this.scannerActive = false;
                        }).catch(err => console.error(err));
                    }
                },

                submitManualToken() {
                    if (!this.manualToken) return;
                    this.verifyToken(this.manualToken);
                    this.manualToken = '';
                },

                verifyToken(tokenStr) {
                    this.isProcessing = true;

                    fetch('/api/scan-ticket', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            token: tokenStr,
                            event_id: this.selectedEventId
                        })
                    })
                    .then(res => res.json().then(data => ({ status: res.status, body: data })))
                    .then(res => {
                        const data = res.body;
                        this.scanResult = true;
                        this.scanResultStatus = data.status;
                        this.scanResultTitle = data.title;
                        this.scanResultMessage = data.message;
                        this.scannedTicket = data.ticket || null;

                        if (data.status === 'valid') {
                            this.playAudioBeep('valid');
                        } else {
                            this.playAudioBeep('invalid');
                        }

                        setTimeout(() => {
                            this.isProcessing = false;
                        }, 2500);
                    })
                    .catch(err => {
                        console.error(err);
                        this.scanResult = true;
                        this.scanResultStatus = 'error';
                        this.scanResultTitle = 'ERROR KONEKSI / SERVER!';
                        this.scanResultMessage = 'Gagal menghubungi server verifikasi gate.';
                        this.playAudioBeep('invalid');
                        setTimeout(() => { this.isProcessing = false; }, 2500);
                    });
                },

                playAudioBeep(type) {
                    try {
                        const ctx = new (window.AudioContext || window.webkitAudioContext)();
                        const osc = ctx.createOscillator();
                        const gain = ctx.createGain();
                        osc.connect(gain);
                        gain.connect(ctx.destination);

                        if (type === 'valid') {
                            // High Pleasant Beep Chime (660Hz -> 880Hz)
                            osc.type = 'sine';
                            osc.frequency.setValueAtTime(660, ctx.currentTime);
                            osc.frequency.exponentialRampToValueAtTime(880, ctx.currentTime + 0.15);
                            gain.gain.setValueAtTime(0.3, ctx.currentTime);
                            osc.start();
                            osc.stop(ctx.currentTime + 0.25);
                        } else {
                            // Low Double Alarm Warning (220Hz Buzz)
                            osc.type = 'sawtooth';
                            osc.frequency.setValueAtTime(220, ctx.currentTime);
                            gain.gain.setValueAtTime(0.4, ctx.currentTime);
                            osc.start();
                            osc.stop(ctx.currentTime + 0.4);
                        }
                    } catch(e) {
                        console.log("Audio play blocked by browser policy");
                    }
                }
            }
        }
    </script>
</x-app-layout>
