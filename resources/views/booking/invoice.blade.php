<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Booking</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 100%; max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; }
        h2 { text-align: center; color: #28a745; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 8px; border-bottom: 1px solid #ddd; text-align: left; }
        .text-right { text-align: right; }
        .footer { margin-top: 20px; text-align: center; font-size: 12px; color: #777; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Invoice Pembayaran</h2>
        <p>Terima kasih, <strong>{{ $booking->customer_name }}</strong>!</p>

        <table>
            <tr>
                <th>Nama Customer</th>
                <td class="text-right">{{ $booking->customer_name }}</td>
            </tr>
            <tr>
                <th>Nomor HP</th>
                <td class="text-right">{{ $booking->customer_phone }}</td>
            </tr>
            <tr>
                <th>Layanan</th>
                <td class="text-right">{{ $booking->service->name }}</td>
            </tr>
            <tr>
                <th>Jumlah Sesi</th>
                <td class="text-right">{{ $booking->sessions }} Sesi</td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td class="text-right"><strong>Rp {{ number_format($booking->total_price) }}</strong></td>
            </tr>
            <tr>
                <th>Tanggal Booking</th>
                <td class="text-right">{{ date('d M Y', strtotime($booking->booking_date)) }}</td>
            </tr>
            <tr>
                <th>Status Pembayaran</th>
                <td class="text-right">
                    <strong style="color: green;">LUNAS</strong>
                </td>
            </tr>
        </table>

        <div class="footer">
            <p>Invoice ini hanya berlaku sebagai bukti pembayaran. Simpan untuk referensi.</p>
        </div>
    </div>
</body>
</html>
