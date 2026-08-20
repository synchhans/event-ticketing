<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@eshace.com'],
            [
                'name' => 'SH Admin EventPass',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        // 2. Create Sample Organizer User
        $organizer = User::firstOrCreate(
            ['email' => 'organizer@eshace.com'],
            [
                'name' => 'CodeWorshipper Live EO',
                'password' => Hash::make('password123'),
                'role' => 'organizer',
            ]
        );

        // 3. Create Sample Gatekeeper / Panitia Scanner
        $gatekeeper = User::firstOrCreate(
            ['email' => 'scanner@eshace.com'],
            [
                'name' => 'Panitia Gate Scanner 01',
                'password' => Hash::make('password123'),
                'role' => 'gatekeeper',
            ]
        );

        // 4. Create Sample Event #1: Tech Fest
        $event1 = Event::firstOrCreate(
            ['slug' => 'codeworshipper-tech-fest-2026'],
            [
                'user_id' => $organizer->id,
                'title' => 'CodeWorshipper Tech Fest & Developer Conference 2026',
                'description' => "Festival teknologi, AI & web development terbesar tahun ini! Dapatkan wawasan langsung dari praktisi industri, live coding workshop, networking dengan ratusan developer, dan eksklusif doorprize.",
                'banner_image' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1200&q=80',
                'event_date' => now()->addDays(14)->setHour(13)->setMinute(0),
                'location_name' => 'Grand Ballroom Hall, Jakarta Convention Center (JCC)',
                'google_maps_url' => 'https://maps.google.com/?q=Jakarta+Convention+Center',
                'is_published' => true,
            ]
        );

        // Categories for Event 1
        $catVip = TicketCategory::firstOrCreate(
            ['event_id' => $event1->id, 'name' => 'VIP Sultan Pass (Front Row + Merchandise)'],
            [
                'price' => 499000,
                'quota' => 50,
                'available_count' => 48,
                'description' => 'Akses baris terdepan, Kaos Eksklusif CodeWorshipper, Goodie Bag, Sertifikat, & Access VIP Lounge + Lunch.',
            ]
        );

        $catRegular = TicketCategory::firstOrCreate(
            ['event_id' => $event1->id, 'name' => 'Regular Developer Ticket'],
            [
                'price' => 149000,
                'quota' => 300,
                'available_count' => 295,
                'description' => 'Akses seluruh sesi seminar & workshop, E-Certificate, & Coffee Break.',
            ]
        );

        // Create Sample Order & Ticket for Testing
        $order1 = Order::firstOrCreate(
            ['order_number' => 'INV-2026-9001'],
            [
                'event_id' => $event1->id,
                'customer_name' => 'Han Synchhans',
                'customer_email' => 'han@eshace.com',
                'customer_phone' => '083804506486',
                'total_amount' => 499000,
                'status' => 'paid',
                'paid_at' => now(),
            ]
        );

        Ticket::firstOrCreate(
            ['ticket_code' => 'TKT-2026-0001'],
            [
                'order_id' => $order1->id,
                'ticket_category_id' => $catVip->id,
                'qr_token' => 'QR-DEMO-VIP-CODEWORSHIPPER-2026',
                'holder_name' => 'Han Synchhans',
                'status' => 'issued',
            ]
        );

        // Sample Event #2: Concert Festival
        $event2 = Event::firstOrCreate(
            ['slug' => 'indie-music-soundfest-2026'],
            [
                'user_id' => $organizer->id,
                'title' => 'Indie Music & Creator Soundfest 2026',
                'description' => "Konser musik indie dan gathering kreator konten terbesar. Nikmati penampilan spesial dari 10+ band papan atas dan exhibition booth.",
                'banner_image' => 'https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=1200&q=80',
                'event_date' => now()->addDays(30)->setHour(16)->setMinute(0),
                'location_name' => 'Lap. Softball Senayan, Gelora Bung Karno (GBK)',
                'google_maps_url' => 'https://maps.google.com/?q=Gelora+Bung+Karno',
                'is_published' => true,
            ]
        );

        TicketCategory::firstOrCreate(
            ['event_id' => $event2->id, 'name' => 'Festival Field Pass'],
            [
                'price' => 99000,
                'quota' => 500,
                'available_count' => 500,
                'description' => 'Akses area festival & stage berdiri.',
            ]
        );
    }
}
