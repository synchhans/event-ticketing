<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScannerController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::where('is_published', true)->orderBy('event_date', 'asc')->get();
        $selectedEventId = $request->query('event_id', $events->first()?->id);

        $recentCheckins = Ticket::where('status', 'used')
            ->when($selectedEventId, function ($query) use ($selectedEventId) {
                $query->whereHas('order', function ($q) use ($selectedEventId) {
                    $q->where('event_id', $selectedEventId);
                });
            })
            ->with(['category', 'order.event', 'checkedInUser'])
            ->orderBy('checked_in_at', 'desc')
            ->take(15)
            ->get();

        return view('scanner.index', compact('events', 'selectedEventId', 'recentCheckins'));
    }

    public function verify(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'event_id' => 'nullable|integer',
        ]);

        $token = trim($request->token);

        // Search by qr_token OR ticket_code OR order_number
        $ticket = Ticket::where('qr_token', $token)
            ->orWhere('ticket_code', strtoupper($token))
            ->orWhereHas('order', function ($q) use ($token) {
                $q->where('order_number', strtoupper($token));
            })
            ->with(['category', 'order.event', 'checkedInUser'])
            ->first();

        if (!$ticket) {
            return response()->json([
                'success' => false,
                'status' => 'invalid',
                'title' => 'TIKET INVALID / TIDAK TERDAFTAR!',
                'message' => "Kode QR atau Token '{$token}' tidak ditemukan dalam database.",
            ], 404);
        }

        // Check if ticket belongs to selected event if provided
        if ($request->event_id && $ticket->order->event_id != $request->event_id) {
            return response()->json([
                'success' => false,
                'status' => 'wrong_event',
                'title' => 'SALAH EVENT / ANGGOTA ACARA LAIN!',
                'message' => "Tiket ini terdaftar untuk event '{$ticket->order->event->title}', bukan event yang dipilih saat ini.",
                'ticket' => $this->formatTicketData($ticket),
            ], 400);
        }

        // Case 1: Already Used
        if ($ticket->status === 'used') {
            $checkedInTime = $ticket->checked_in_at ? $ticket->checked_in_at->format('d M Y H:i:s') : 'waktu sebelumnya';
            $checkerName = $ticket->checkedInUser ? $ticket->checkedInUser->name : 'Panitia Scanner';

            return response()->json([
                'success' => false,
                'status' => 'already_used',
                'title' => '🛑 TIKET SUDAH DIPAKAI SEBELUMNYA!',
                'message' => "Tiket ini telah di-scan dan terverifikasi pada {$checkedInTime} oleh {$checkerName}.",
                'ticket' => $this->formatTicketData($ticket),
            ], 409);
        }

        // Case 2: Issued -> Verify & Mark as Used
        $ticket->update([
            'status' => 'used',
            'checked_in_at' => now(),
            'checked_in_by' => Auth::id(),
        ]);

        return response()->json([
            'success' => true,
            'status' => 'valid',
            'title' => '🟢 TIKET VALID - SILAKAN MASUK!',
            'message' => "Verifikasi sukses! Pengunjung {$ticket->holder_name} terdaftar untuk kategori {$ticket->category->name}.",
            'ticket' => $this->formatTicketData($ticket),
        ]);
    }

    private function formatTicketData(Ticket $ticket): array
    {
        return [
            'id' => $ticket->id,
            'ticket_code' => $ticket->ticket_code,
            'holder_name' => $ticket->holder_name,
            'customer_email' => $ticket->order->customer_email,
            'customer_phone' => $ticket->order->customer_phone,
            'category_name' => $ticket->category->name,
            'event_title' => $ticket->order->event->title,
            'status' => $ticket->status,
            'checked_in_at' => $ticket->checked_in_at ? $ticket->checked_in_at->format('d M Y H:i:s') : null,
            'checked_in_by' => $ticket->checkedInUser ? $ticket->checkedInUser->name : null,
        ];
    }
}
