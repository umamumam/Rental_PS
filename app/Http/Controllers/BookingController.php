<?php

namespace App\Http\Controllers;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:15',
            'booking_date' => 'required|date',
            'sessions' => 'required|integer|min:1',
        ]);

        $service = \App\Models\Service::findOrFail($request->service_id);
        $total_price = $service->price * $request->sessions;

        // Tambahan biaya weekend
        $day = date('l', strtotime($request->booking_date));
        if ($day == 'Saturday' || $day == 'Sunday') {
            $total_price += 50000;
        }

        // Simpan booking dengan status pending
        $booking = Booking::create([
            'service_id' => $request->service_id,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'booking_date' => $request->booking_date,
            'sessions' => $request->sessions,
            'total_price' => $total_price,
            'status' => 'pending',
        ]);

        // **Integrasi Midtrans**
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => 'BOOK-' . $booking->id,
                'gross_amount' => $total_price,
            ],
            'customer_details' => [
                'first_name' => $request->customer_name,
                'phone' => $request->customer_phone,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('booking.confirmation', compact('snapToken', 'booking'));
    }

    public function success($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'success';
        $booking->save();

        if (auth()->check()) {
            return redirect('/dashboard')->with('success', 'Pembayaran berhasil!');
        }

        return view('booking.success', compact('booking'));
    }

    public function myBookings(Request $request)
    {
        $query = Booking::query();

        if ($request->customer_name) {
            $query->where('customer_name', 'like', '%' . $request->customer_name . '%');
        }

        if ($request->start_date && $request->end_date) {
            $query->whereBetween('booking_date', [$request->start_date, $request->end_date]);
        } elseif ($request->start_date) {
            $query->whereDate('booking_date', '>=', $request->start_date);
        } elseif ($request->end_date) {
            $query->whereDate('booking_date', '<=', $request->end_date);
        }

        $bookings = $query->latest()->get();

        return view('booking.history', compact('bookings'));
    }

    public function processPayment($booking)
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Buat transaksi Midtrans
        $transaction = [
            'transaction_details' => [
                'order_id' => 'BOOK-' . $booking->id,
                'gross_amount' => $booking->total_price,
            ],
            'customer_details' => [
                'first_name' => $booking->customer_name,
                'phone' => $booking->customer_phone,
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($transaction);
            return response()->json(['snapToken' => $snapToken]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,success,failed,cancel',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return redirect()->back()->with('success', 'Status booking diperbarui.');
    }
    public function calendar()
    {
        $bookings = Booking::all(['booking_date', 'customer_name']);

        $events = [];
        foreach ($bookings as $booking) {
            $events[] = [
                'title' => 'Booked - ' . $booking->customer_name,
                'start' => $booking->booking_date,
                'backgroundColor' => '#ff0000', // Warna merah untuk booking penuh
                'borderColor' => '#ff0000',
            ];
        }

        return view('calendar', compact('events'));
    }

    public function downloadInvoice($id)
    {
        $booking = Booking::findOrFail($id);

        $pdf = Pdf::loadView('booking.invoice', compact('booking'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('invoice-' . $booking->id . '.pdf');
    }
}
