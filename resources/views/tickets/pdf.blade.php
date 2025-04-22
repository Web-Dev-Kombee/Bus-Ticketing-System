<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Bus Ticket</title>
    <style>
        /* Reliable page settings for DomPDF */
        @page {
            margin: 0;
            padding: 0;
            size: 8.5in 3.5in; /* Standard receipt size that DomPDF handles well */
        }
        
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 0;
            font-size: 10pt;
            line-height: 1.3;
            color: #333;
        }
        
        /* Main container */
        .ticket-container {
            width: 100%;
            border: 1px solid #ccc;
            background-color: #fff;
        }
        
        /* Main table layout */
        .main-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        /* Header styling */
        .header {
            background-color: #1a5276;
            color: #fff;
            padding: 6px 10px;
        }
        
        .company-name {
            font-size: 14pt;
            font-weight: bold;
        }
        
        .company-tagline {
            font-size: 8pt;
            font-style: italic;
        }
        
        /* Main content area */
        .content {
            padding: 6px 10px;
            background-color: #f9f9f9;
        }
        
        /* Route info */
        .route-info {
            margin-bottom: 8px;
        }
        
        .route-title {
            font-size: 16pt;
            font-weight: bold;
            color: #1a5276;
        }
        
        .journey-details {
            font-size: 8pt;
            color: #555;
        }
        
        /* Passenger info */
        .passenger-info {
            margin-bottom: 6px;
        }
        
        .label {
            font-size: 7pt;
            text-transform: uppercase;
            color: #777;
        }
        
        .value {
            font-weight: bold;
        }
        
        /* Details grid */
        .details-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .details-table td {
            padding: 3px 5px;
        }
        
        /* Tear-off stub */
        .stub {
            background-color: #f3f3f3;
            border-left: 1px dashed #999;
            text-align: center;
            padding: 8px;
        }
        
        .seat-number {
            font-size: 24pt;
            font-weight: bold;
            color: #1a5276;
        }
        
        .seat-label {
            font-size: 8pt;
            text-transform: uppercase;
            color: #777;
        }
        
        .qr-box {
            margin: 8px auto;
            border: 1px solid #ccc;
            padding: 2px;
            background-color: #fff;
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
        }
        
        .boarding-info {
            font-size: 7pt;
            color: #666;
            margin-top: 3px;
        }
        
        /* Bottom info bar */
        .info-bar {
            background-color: #1a5276;
            color: #fff;
            font-size: 7pt;
            padding: 3px 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <table class="main-table">
            <!-- Header Row -->
            <tr>
                <td class="header" colspan="2">
                    <div class="company-name">EXPRESS BUS LINES</div>
                    <div class="company-tagline">Your Comfortable Journey Partner</div>
                </td>
            </tr>
            
            <!-- Main Content Row -->
            <tr>
                <td class="content" width="75%">
                    <!-- Route Information -->
                    <div class="route-info">
                        <div class="route-title">{{ explode(' → ', $booking->route)[0] ?? '' }} → {{ explode(' → ', $booking->route)[1] ?? '' }}</div>
                        <div class="journey-details">
                            {{ $booking->departure_time }} | {{ \Carbon\Carbon::now()->format('l, F j, Y') }}
                        </div>
                    </div>
                    
                    <!-- Passenger Information -->
                    <div class="passenger-info">
                        <div class="label">PASSENGER NAME</div>
                        <div class="value">{{ $booking->name }}</div>
                    </div>
                    
                    <!-- Travel Details -->
                    <table class="details-table">
                        <tr>
                            <td width="25%">
                                <div class="label">BUS NAME</div>
                                <div class="value">{{ $booking->seat->bus->name ?? 'N/A' }}</div>
                            </td>
                            <td width="25%">
                                <div class="label">BUS TYPE</div>
                                <div class="value">{{ $booking->seat->bus->type ?? 'N/A' }}</div>
                            </td>
                            <td width="25%">
                                <div class="label">SEAT</div>
                                <div class="value">{{ $booking->seat_number }}</div>
                            </td>
                            <td width="25%">
                                <div class="label">PLATFORM</div>
                                <div class="value">{{ $booking->platform ?? 'A' }}</div>
                            </td>
                            <td width="25%">
                                <div class="label">DRIVER</div>
                                <div class="value">{{ $booking->seat->bus->driver_name ?? 'N/A' }}</div>
                            </td>
                            <td width="25%">
                                <div class="label">TICKET #</div>
                                <div class="value">{{ $booking->ticket_number }}</div>
                            </td>
                        </tr>
                    </table>
                    
                    <!-- Additional Notes -->
                    <div style="margin-top:5px; font-size:8pt;">
                        <div class="label">NOTES</div>
                        <div>Please arrive 30 minutes before departure. No refunds after boarding.</div>
                    </div>
                </td>
                
                <!-- Tear-off Stub -->
                <td class="stub" width="25%">
                    <div class="seat-number">{{ $booking->seat_number }}</div>
                    <div class="seat-label">SEAT</div>
                    
                    @if($booking->qr_code_path)
                    <img class="qr-box" src="{{ public_path('storage/' . $booking->qr_code_path) }}" alt="QR Code">
                    @else
                    <div class="qr-box">QR</div>
                    @endif
                    
                    <div class="boarding-info">
                        {{ $booking->departure_time }}<br>
                        PLATFORM {{ $booking->platform ?? 'A' }}
                    </div>
                </td>
            </tr>
            <!-- Footer Information Bar -->
            <tr>
                <td class="info-bar" colspan="2">
                    Thank you for choosing Skyline Express! • Customer Service: 1-800-555-0123 • www.skyline-express.com
                </td>
            </tr>
        </table>
    </div>
</body>
</html>