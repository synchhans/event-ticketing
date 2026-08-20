<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketController extends Controller
{
    public function show($code)
    {
        $ticket = Ticket::where('ticket_code', $code)
            ->with(['order.event', 'category'])
            ->firstOrFail();

        // Generate QR Code SVG string
        $qrSvg = QrCode::size(220)
            ->color(16, 185, 129) // Emerald color #10B981
            ->margin(1)
            ->generate($ticket->qr_token);

        return view('tickets.show', compact('ticket', 'qrSvg'));
    }

    public function pdf($code)
    {
        $ticket = Ticket::where('ticket_code', $code)
            ->with(['order.event', 'category'])
            ->firstOrFail();

        $qrSvg = QrCode::size(200)
            ->color(15, 23, 42) // Dark color
            ->margin(1)
            ->generate($ticket->qr_token);

        return view('tickets.pdf', compact('ticket', 'qrSvg'));
    }
}
