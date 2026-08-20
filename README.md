# EventPass — Platform Tiket Event & QR Gate Pass Scanner Real-Time

> Source Code Open Source dikembangkan untuk komunitas YouTube <a href="https://www.youtube.com/@codeworshipper?sub_confirmation=1" target="_blank" rel="noopener noreferrer"><strong>CodeWorshipper</strong></a>.

![EventPass Banner](https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1200&q=80)

EventPass adalah aplikasi web manajemen event, pemesanan tiket online, generasi E-Tiket digital ber-QR Code unik, dan pemindaian pintu masuk (Gate Pass Scanner) berbasis kamera HP/Laptop secara real-time.

---

## Live Demo

* **Situs Utama**: <a href="https://event.eshace.com" target="_blank" rel="noopener noreferrer">https://event.eshace.com</a>
* **Scanner Gate Panitia**: <a href="https://event.eshace.com/scanner" target="_blank" rel="noopener noreferrer">https://event.eshace.com/scanner</a>
* **Dashboard Admin**: <a href="https://event.eshace.com/admin/dashboard" target="_blank" rel="noopener noreferrer">https://event.eshace.com/admin/dashboard</a>

### Akun Demo Bawaan:
* **Admin Control**:
  * Email: `admin@eshace.com`
  * Password: `password123`
* **Panitia Gate Scanner**:
  * Email: `scanner@eshace.com`
  * Password: `password123`
* **Demo E-Tiket Valid**:
  * URL: <a href="https://event.eshace.com/ticket/TKT-2026-0001" target="_blank" rel="noopener noreferrer">https://event.eshace.com/ticket/TKT-2026-0001</a>

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
   Salin file `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   ```

3. **Install Dependensi PHP & Generate Application Key**
   ```bash
   composer install
   php artisan key:generate
   ```

4. **Jalankan Migrasi Database & Seeder Data Demo**
   ```bash
   php artisan migrate --seed
   ```
   *(Jika muncul konfirmasi pembuatan database baru di terminal, ketik `y` atau tekan Enter).*

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

Project ini dilisensikan di bawah **MIT License**. Powered by <a href="https://eshace.com" target="_blank" rel="noopener noreferrer"><strong>SHC</strong></a> for <a href="https://www.youtube.com/@codeworshipper?sub_confirmation=1" target="_blank" rel="noopener noreferrer"><strong>CodeWorshipper</strong></a>.
