<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>E-Tiket PDF - {{ $ticket->ticket_code }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #1e293b;
            background: #fff;
        }
        .ticket-box {
            max-w: 600px;
            margin: 0 auto;
            border: 2px dashed #0f172a;
            border-radius: 16px;
            padding: 24px;
        }
        .header {
            border-bottom: 2px solid #0f172a;
            padding-bottom: 12px;
            margin-bottom: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .brand {
            font-size: 20px;
            font-weight: bold;
            color: #10b981;
        }
        .code {
            font-family: monospace;
            font-size: 16px;
            font-weight: bold;
        }
        .event-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
        }
        .event-meta {
            font-size: 12px;
            color: #64748b;
            margin-bottom: 16px;
        }
        .qr-section {
            text-align: center;
            margin: 20px 0;
        }
        .holder-name {
            font-size: 16px;
            font-weight: bold;
            margin-top: 8px;
        }
        .footer-note {
            font-size: 10px;
            color: #94a3b8;
            text-align: center;
            margin-top: 20px;
            border-top: 1px solid #e2e8f0;
            padding-top: 10px;
        }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body onload="window.print()">

    <div class="no-print" style="text-align: center; margin-bottom: 20px;">
        <button onclick="window.print()" style="padding: 10px 20px; background: #10b981; color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer;">
            🖨️ Cetak / Simpan PDF
        </button>
    </div>

    <div class="ticket-box">
        <div class="header">
            <div class="brand">EventPass 🎟️</div>
            <div class="code">{{ $ticket->ticket_code }}</div>
        </div>

        <div class="event-title">{{ $ticket->order->event->title }}</div>
        <div class="event-meta">
            📅 {{ $ticket->order->event->event_date->format('d M Y • H:i') }} WIB <br>
            📍 {{ $ticket->order->event->location_name }} <br>
            🏷️ Kategori: <strong>{{ $ticket->category->name }}</strong>
        </div>

        <div class="qr-section">
            <div>{!! $qrSvg !!}</div>
            <div class="holder-name">{{ $ticket->holder_name }}</div>
            <div style="font-size: 11px; color: #64748b;">{{ $ticket->order->customer_email }}</div>
        </div>

        <div class="footer-note">
            Satu QR Code hanya dapat di-scan 1 (satu) kali di gate venue. <br>
            Powered by <a href="https://eshace.com" style="color:#10b981;font-weight:bold;text-decoration:none;">SHC</a> for <a href="https://www.youtube.com/@codeworshipper?sub_confirmation=1" style="color:#10b981;font-weight:bold;text-decoration:none;">CodeWorshipper</a>.
        </div>
    </div>

</body>
</html>
