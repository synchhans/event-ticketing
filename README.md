# EventPass — Platform Tiket Event & QR Gate Pass Scanner Real-Time

> Source Code Open Source dikembangkan untuk komunitas YouTube **[CodeWorshipper](https://youtube.com)**.

EventPass adalah aplikasi web manajemen event, pemesanan tiket online, generasi E-Tiket digital ber-QR Code unik, dan pemindaian pintu masuk (Gate Pass Scanner) berbasis kamera HP/Laptop secara real-time.

---

## Live Demo

* **Situs Utama**: [https://event.eshace.com](https://event.eshace.com)
* **Scanner Gate Panitia**: [https://event.eshace.com/scanner](https://event.eshace.com/scanner)
* **Dashboard Admin**: [https://event.eshace.com/admin/dashboard](https://event.eshace.com/admin/dashboard)

### Akun Demo Bawaan:
* **Admin Control**:
  * Email: `admin@eshace.com`
  * Password: `password123`
* **Panitia Gate Scanner**:
  * Email: `scanner@eshace.com`
  * Password: `password123`
* **Demo E-Tiket Valid**:
  * URL: [https://event.eshace.com/ticket/TKT-2026-0001](https://event.eshace.com/ticket/TKT-2026-0001)

---

## Fitur Utama

* **Katalog Event & Booking**: Poster banner countdown, tier tiket (VIP, Regular, Presale), dan checkout form.
* **E-Tiket Digital & PDF**: QR Code SVG unik dan opsi cetak PDF E-Tiket.
* **Camera QR Scanner Real-Time**: Pemindaian kamera HP/Webcam dengan Web Audio API feedback (suara valid / alarm tiket terpakai).
* **Admin Dashboard & Attendance Tracker**: Real-time % check-in gate, form terbit event baru, dan ekspor CSV data peserta.

---

## Panduan Instalasi Lokal

### Prasyarat:
* PHP versi 8.2 atau 8.3
* Composer
* Node.js & npm

---

### Langkah Instalasi:

1. **Clone Repository**
   ```bash
   git clone https://github.com/synchhans/event-ticketing.git
   cd event-ticketing
   ```

2. **Buka Terminal di Text Editor (VS Code / Cursor / PHPStorm)**
   Salin file konfigurasi `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   ```

3. **Install Dependensi PHP**
   ```bash
   composer install
   ```

4. **Generate Key & Jalankan Migrasi Data**
   ```bash
   php artisan key:generate
   php artisan migrate --seed
   ```
   *(Jika muncul pertanyaan konfirmasi pembuatan database baru di terminal, ketik `y` atau tekan Enter).*

5. **Install & Build Frontend Assets**
   ```bash
   npm install && npm run build
   ```

6. **Jalankan Server Lokal**
   ```bash
   php artisan serve
   ```
   Akses di browser: `http://localhost:8000`

---

## Lisensi

Project ini dilisensikan di bawah **MIT License**. Powered by **SHC** for **CodeWorshipper**.
