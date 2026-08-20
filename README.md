# 🎟️ EventPass — Platform Tiket Event & QR Gate Pass Scanner Real-Time

> **Source Code Gratis & Open Source** dikembangkan khusus untuk komunitas YouTube **[CodeWorshipper](https://youtube.com)**.

![EventPass Banner](https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1200&q=80)

**EventPass** adalah aplikasi web manajemen event, pemesanan tiket online, generasi E-Tiket digital ber-QR Code unik, dan pemindaian pintu masuk (Gate Pass Scanner) berbasis kamera HP/Laptop secara real-time.

---

## 🚀 Live Demo Production

* 🌐 **Situs Utama**: [https://event.eshace.com](https://event.eshace.com)
* 📱 **Scanner Gate Panitia**: [https://event.eshace.com/scanner](https://event.eshace.com/scanner)
* 👑 **Dashboard Admin**: [https://event.eshace.com/admin/dashboard](https://event.eshace.com/admin/dashboard)

### 🔑 Akun Demo Bawaan (Default Credentials):
* **Admin SH Control**:
  * Email: `admin@eshace.com`
  * Password: `password123`
* **Panitia Gate Scanner**:
  * Email: `scanner@eshace.com`
  * Password: `password123`
* **Demo E-Tiket Valid (Untuk Tes Scan 2 HP)**:
  * URL: [https://event.eshace.com/ticket/TKT-2026-0001](https://event.eshace.com/ticket/TKT-2026-0001)

---

## ✨ Fitur Unggulan

### 1. 🎟️ Public Booking & Event Catalog
* **Hero Event Showcase**: Banner visual dengan Countdown Timer hari-H, lokasi venue map, dan tombol pesan.
* **Tier Kategori Tiket**: Tiket VIP Sultan, Regular, Early Bird dengan kuota sisa otomatis berkurang saat dipesan.
* **Form Pemesanan Ringan**: Pengisian data pembeli instan.

### 2. 🎫 Digital E-Ticket & Printable PDF
* **E-Tiket Digital QR Code**: E-Tiket dengan **QR Code SVG Unik (Encrypted Token)** & Barcode.
* **Cetak E-Tiket PDF**: Support cetak langsung atau simpan dalam format PDF (`window.print()`).

### 3. 📱 Gatekeeper Camera QR Scanner App (`/scanner`)
* **Pemindai Kamera HP / Webcam Real-Time**: Menggunakan library `html5-qrcode` tanpa perlu install aplikasi Android/iOS.
* **Web Audio API Feedback**:
  * 🟢 **VALID BEEP**: Nada Chime tinggi saat tiket terverifikasi sah.
  * 🔴 **ALARM WARNING**: Nada Alarm ganda jika tiket sudah pernah di-scan sebelumnya (*Mencegah Tiket Ganda*).
  * 🟡 **ERROR TONE**: Nada peringatan jika QR Code tidak terdaftar.
* **Manual Input Fallback**: Fitur pencarian kode tiket / email jika layar HP pengunjung rusak / mati.

### 4. 📊 Admin Control & Attendance Tracker (`/admin/dashboard`)
* **Live Attendance Metrics**: Total event, total omset (Rp), total tiket terbit, dan **Persentase Kehadiran Gate (% Check-in)**.
* **Form Tambah Event**: Terbitkan event & kuota tiket baru langsung dari dashboard admin.
* **Ekspor CSV Peserta**: Unduh data peserta event lengkap dengan jam check-in dalam format CSV/Excel.

### 5. 💰 Lead Magnet & WA Gateway Upsell Hook
* Integrasi pengiriman otomatis E-Tiket PDF ke nomor WhatsApp pembeli via **[WACentrix WA Gateway](https://wa.eshace.com)**.

---

## 🛠️ Panduan Instalasi Lokal (Ramah Pemula)

Ikuti langkah-langkah mudah berikut untuk menjalankan project ini di komputer lokal Anda:

### 📋 Prasyarat Sistem:
* **PHP** versi 8.2 atau 8.3
* **Composer** (Package Manager PHP)
* **Node.js** (v18 atau v20+) & npm
* **MySQL / MariaDB**

---

### 💻 Langkah 1: Clone Repository
Buka Terminal / Command Prompt dan jalankan:
```bash
git clone https://github.com/synchhans/event-ticketing.git
cd event-ticketing
```

### 📦 Langkah 2: Install Dependensi PHP
```bash
composer install
```

### ⚙️ Langkah 3: Setup File `.env` & Database
Salin file konfigurasi `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```

Buka file `.env` dan atur koneksi database MySQL Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=event_ticketing
DB_USERNAME=root
DB_PASSWORD=
```

Buat database baru bernama `event_ticketing` di phpMyAdmin / MySQL CLI:
```sql
CREATE DATABASE event_ticketing;
```

### 🔑 Langkah 4: Generate App Key & Jalankan Migrasi + Seeder Data Demo
```bash
php artisan key:generate
php artisan migrate --seed
```

### 🎨 Langkah 5: Install & Build Assets Frontend (Tailwind CSS & Vite)
```bash
npm install
npm run build
```

### 🚀 Langkah 6: Jalankan Server Lokal
```bash
php artisan serve
```

Buka browser Anda dan akses:
👉 **[http://localhost:8000](http://localhost:8000)**

---

## 📂 Arsitektur Folder Utama

```text
event-ticketing/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/AdminEventController.php  # Dashboard Admin & Ekspor CSV
│   │   ├── EventController.php             # Browsing Event & Checkout
│   │   ├── ScannerController.php           # Logic Scanner Kamera & Gate Pass
│   │   └── TicketController.php            # Render E-Tiket Digital & PDF
│   └── Models/
│       ├── Event.php
│       ├── Order.php
│       ├── Ticket.php
│       ├── TicketCategory.php
│       └── User.php
├── database/
│   ├── migrations/                         # Skema Tabel Database
│   └── seeders/DatabaseSeeder.php          # Seeder Event Demo & Akun Admin
├── resources/
│   └── views/
│       ├── admin/dashboard.blade.php       # Tampilan Dashboard Admin
│       ├── events/                         # Landing Catalog & Detail Event
│       ├── scanner/index.blade.php         # Web App Scanner Gate Kamera
│       └── tickets/                        # Digital E-Ticket & Printable PDF
└── routes/
    └── web.php                             # Route Web Aplikasi
```

---

## 📜 Lisensi & Attribution

Project ini dilisensikan di bawah **MIT License** — Anda bebas menggunakan, memodifikasi, dan membagikan source code ini untuk keperluan pembelajaran, tugas akhir, portofolio, maupun komersial.

❤️ *Created with Passion for **CodeWorshipper** Community & Indonesian Developers.*
EOF
