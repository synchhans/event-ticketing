<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\TicketCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminEventController extends Controller
{
    public function dashboard()
    {
        $events = Event::with(['ticketCategories', 'organizer'])->latest()->get();
        $totalIssued = Ticket::count();
        $totalUsed = Ticket::where('status', 'used')->count();
        $totalRevenue = Order::where('status', 'paid')->sum('total_amount');
        $checkinPercentage = $totalIssued > 0 ? round(($totalUsed / $totalIssued) * 100, 1) : 0;

        $recentTickets = Ticket::with(['category', 'order.event', 'checkedInUser'])->latest()->paginate(15);

        return view('admin.dashboard', compact('events', 'totalIssued', 'totalUsed', 'totalRevenue', 'checkinPercentage', 'recentTickets'));
    }

    public function storeEvent(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'banner_image' => 'nullable|string|max:500',
            'event_date' => 'required|date',
            'location_name' => 'required|string|max:255',
            'google_maps_url' => 'nullable|string|max:500',
            'category_name' => 'required|string|max:255',
            'category_price' => 'required|numeric|min:0',
            'category_quota' => 'required|integer|min:1',
        ]);

        $slug = Str::slug($request->title) . '-' . Str::random(4);

        $event = Event::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'banner_image' => $request->banner_image ?: 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1200&q=80',
            'event_date' => $request->event_date,
            'location_name' => $request->location_name,
            'google_maps_url' => $request->google_maps_url,
            'is_published' => true,
        ]);

        TicketCategory::create([
            'event_id' => $event->id,
            'name' => $request->category_name,
            'price' => $request->category_price,
            'quota' => $request->category_quota,
            'available_count' => $request->category_quota,
            'description' => 'Tiket resmi ' . $request->category_name,
        ]);

        return back()->with('success', "🎉 Event '{$event->title}' berhasil dibuat & diterbitkan!");
    }

    public function exportCsv($eventId)
    {
        $event = Event::findOrFail($eventId);
        $tickets = Ticket::whereHas('order', function ($q) use ($eventId) {
            $q->where('event_id', $eventId);
        })->with(['category', 'order', 'checkedInUser'])->get();

        $fileName = 'peserta-event-' . $event->slug . '-' . date('Y-m-d') . '.csv';

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $callback = function () use ($tickets) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Kode Tiket', 'Nama Peserta', 'Email', 'No HP', 'Kategori Tiket', 'Harga (Rp)', 'Status Gate', 'Waktu Check-in', 'Panitia Gate']);

            foreach ($tickets as $t) {
                fputcsv($file, [
                    $t->ticket_code,
                    $t->holder_name,
                    $t->order->customer_email ?? '-',
                    $t->order->customer_phone ?? '-',
                    $t->category->name ?? '-',
                    number_format($t->category->price ?? 0, 0, ',', '.'),
                    $t->status === 'used' ? 'TERVERIFIKASI / HADIR' : 'BELUM CHECK-IN',
                    $t->checked_in_at ? $t->checked_in_at->format('d/m/Y H:i') : '-',
                    $t->checkedInUser->name ?? '-',
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
