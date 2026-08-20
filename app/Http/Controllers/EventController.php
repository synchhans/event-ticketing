<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\TicketCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('is_published', true)
            ->with(['ticketCategories'])
            ->orderBy('event_date', 'asc')
            ->get();

        return view('events.index', compact('events'));
    }

    public function show($slug)
    {
        $event = Event::where('slug', $slug)
            ->with(['ticketCategories', 'organizer'])
            ->firstOrFail();

        return view('events.show', compact('event'));
    }

    public function checkout(Request $request, $slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();

        $request->validate([
            'ticket_category_id' => 'required|exists:ticket_categories,id',
            'quantity' => 'required|integer|min:1|max:5',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
        ]);

        $category = TicketCategory::where('id', $request->ticket_category_id)
            ->where('event_id', $event->id)
            ->firstOrFail();

        if ($category->available_count < $request->quantity) {
            return back()->with('error', 'Sisa kuota tiket tidak mencukupi untuk jumlah pesanan ini.');
        }

        DB::beginTransaction();
        try {
            // 1. Create Order
            $orderNumber = 'INV-' . date('Ymd') . '-' . strtoupper(Str::random(5));
            $totalAmount = $category->price * $request->quantity;

            $order = Order::create([
                'event_id' => $event->id,
                'user_id' => auth()->id(),
                'order_number' => $orderNumber,
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'total_amount' => $totalAmount,
                'status' => 'paid',
                'paid_at' => now(),
            ]);

            // 2. Create Tickets
            $issuedTickets = [];
            for ($i = 1; $i <= $request->quantity; $i++) {
                $ticketCode = 'TKT-' . date('Y') . '-' . strtoupper(Str::random(6));
                $qrToken = 'QR-' . strtoupper(Str::random(12)) . '-' . time();

                $ticket = Ticket::create([
                    'order_id' => $order->id,
                    'ticket_category_id' => $category->id,
                    'ticket_code' => $ticketCode,
                    'qr_token' => $qrToken,
                    'holder_name' => $request->customer_name . ($request->quantity > 1 ? " (#{$i})" : ""),
                    'status' => 'issued',
                ]);

                $issuedTickets[] = $ticket;
            }

            // 3. Decrement available ticket count
            $category->decrement('available_count', $request->quantity);

            DB::commit();

            // Redirect to first issued ticket view
            $firstTicket = $issuedTickets[0];
            return redirect()->route('tickets.show', $firstTicket->ticket_code)
                ->with('success', "🎉 Berhasil! Pembelian {$request->quantity} tiket berhasil diterbitkan.");

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan sistem saat memproses pemesanan tiket: ' . $e->getMessage());
        }
    }
}
