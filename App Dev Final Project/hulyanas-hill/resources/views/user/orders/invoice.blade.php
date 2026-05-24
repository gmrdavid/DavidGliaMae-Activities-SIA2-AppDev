<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice - {{ $order->order_number }}</title>

    <style>
        /* ========================
           GLOBAL RESET
           ======================== */
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            font-size: 14px; /* Slightly larger for readability */
            margin: 0;
            padding: 0;
        }

        /* ========================
           INVOICE CONTAINER
           ======================== */
        .invoice-container {
            background-color: #fff;
            max-width: 800px;
            margin: 40px auto;
            padding: 40px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            position: relative;
            border-radius: 4px;
        }

        /* ========================
           HEADER SECTION
           ======================== */
        .header-table {
            width: 100%;
            border-bottom: 2px solid #333;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .logo-cell {
            vertical-align: top;
            width: 50%;
        }

        .logo {
            width: 120px;
            height: auto;
        }

        .brand-name {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 10px;
            display: block;
        }

        .invoice-details-cell {
            text-align: right;
            vertical-align: top;
        }

        .invoice-title {
            font-size: 36px;
            font-weight: 300;
            color: #888;
            margin: 0;
            line-height: 1;
        }

        .invoice-meta {
            margin-top: 10px;
            font-size: 13px;
            color: #555;
        }
        
        .invoice-meta strong {
            color: #333;
        }

        /* ========================
           ADDRESS SECTION
           ======================== */
        .address-section {
            margin-bottom: 40px;
        }

        .bill-to h3, .ship-to h3 {
            font-size: 14px;
            text-transform: uppercase;
            color: #999;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        /* ========================
           ITEMS TABLE
           ======================== */
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .items-table th {
            background-color: #333;
            color: #fff;
            padding: 10px 12px;
            text-align: left;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
        }

        .items-table td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        .items-table td.text-right {
            text-align: right;
        }

        .items-table th.text-right {
            text-align: right;
        }

        /* ========================
           TOTALS SECTION
           ======================== */
        .totals-section {
            width: 100%;
            display: flex;
            justify-content: flex-end;
        }

        .totals-table {
            width: 300px;
            border-collapse: collapse;
        }

        .totals-table td {
            padding: 8px 12px;
            text-align: right;
        }

        .totals-table .label {
            color: #555;
            font-weight: normal;
        }

        .totals-table .amount {
            font-weight: bold;
            font-size: 16px;
        }

        .grand-total {
            border-top: 2px solid #333 !important;
            padding-top: 12px !important;
            margin-top: 8px;
            font-size: 18px !important;
        }

        /* ========================
           FOOTER & STAMPS
           ======================== */
        .footer {
            margin-top: 50px;
            border-top: 1px solid #eee;
            padding-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #888;
        }

        /* Status Badge (Bottom Right) */
        .status-badge {
            position: absolute;
            top: 40px;
            right: 40px;
            padding: 8px 16px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 12px;
            border-radius: 4px;
        }

        .status-paid {
            background-color: #27ae60;
            color: white;
        }

        .status-cod {
            background-color: #f39c12;
            color: white;
        }

        .status-pending {
            background-color: #e74c3c;
            color: white;
        }

        /* Watermark PAID (Background) */
        .paid-watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            font-size: 120px;
            font-weight: bold;
            color: rgba(39, 174, 96, 0.15); /* Green, transparent */
            z-index: 0;
            pointer-events: none;
            white-space: nowrap;
        }

    </style>
</head>
<body>

    @php
        $subtotal = $order->total_amount ?? 0;
        $tax = $subtotal * 0.12;
        $grandTotal = $subtotal + $tax;
    @endphp

    <!-- Watermark (Only shows if Paid) -->
    @if($order->status === 'completed')
        <div class="paid-watermark">PAID</div>
    @endif

    <div class="invoice-container">

        <!-- Status Badge -->
        @if($order->status === 'completed')
            <div class="status-badge status-paid">PAID</div>
        @elseif($order->payment_method === 'cod')
            <div class="status-badge status-cod">CASH ON DELIVERY</div>
        @else
            <div class="status-badge status-pending">PENDING PAYMENT</div>
        @endif

        <!-- HEADER -->
        <table class="header-table">
            <tr>
                <td class="logo-cell">
                    <!-- Replace with path to your logo -->
                    <span class="brand-name">HULYANAS HILL</span>
                    <div style="margin-top: 5px; font-size: 12px; color: #666;">
                        Official Invoice / Receipt<br>
                        www.hulyanashill.com
                    </div>
                </td>
                <td class="invoice-details-cell">
                    <h1 class="invoice-title">INVOICE</h1>
                    <div class="invoice-meta">
                        <strong>Invoice #:</strong> {{ $order->order_number }}<br>
                        <strong>Date:</strong> {{ $order->created_at->format('F d, Y h:i A') }}
                    </div>
                </td>
            </tr>
        </table>

        <!-- BILL TO / SHIP TO -->
        <table class="address-section">
            <tr>
                <td width="50%" valign="top">
                    <div class="bill-to">
                        <h3>From</h3
                                                Hulyanas Hill Inc.<br>
                        123 Food Street, City Center<br>
                        Manila, Philippines
                    </div>
                </td>
                <td width="50%" valign="top">
                    <div class="ship-to">
                        <h3>Bill To / Ship To</h3>
                        <strong>{{ $order->user->name ?? 'Guest Customer' }}</strong><br>
                        {{ $order->shipping_address }}<br>
                        {{ $order->phone }}
                    </div>
                </td>
            </tr>
        </table>

        <!-- ITEMS TABLE -->
        <table class="items-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th class="text-right">Qty</th>
                    <th class="text-right">Unit Price</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>
                        <strong>{{ $item->product->name ?? 'Deleted Item' }}</strong>
                    </td>
                    <td class="text-right">{{ $item->quantity }}</td>
                    <td class="text-right">{{ number_format($item->price, 2) }}</td>
                    <td class="text-right">{{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- TOTALS -->
        <div class="totals-section">
            <table class="totals-table">

                <tr>
                    <td class="label">Subtotal</td>
                    <td class="amount">{{ number_format($subtotal, 2) }}</td>
                </tr>

                <tr>
                    <td class="label">Tax (12%)</td>
                    <td class="amount">{{ number_format($tax, 2) }}</td>
                </tr>

                <tr>
                    <td class="label grand-total"><strong>Grand Total</strong></td>
                    <td class="amount grand-total">
                        <strong>PHP {{ number_format($grandTotal, 2) }}</strong>
                    </td>
                </tr>

            </table>
        </div>

        <div class="footer">
            <p><strong>Payment Method:</strong> {{ strtoupper($order->payment_method) }}</p>
            <p>Thank you for ordering at Hulyanas Hill!</p>
            <p>This is a system-generated invoice. Please keep this for your records.</p>
        </div>

    </div>
</body>
</html>