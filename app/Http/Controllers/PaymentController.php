<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Booking;

class PaymentController extends Controller
{
    public function process(Request $request)
    {
        $booking = Booking::findOrFail($request->booking_id);

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Data transaksi
        $transaction = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . $booking->id,
                'gross_amount' => $booking->total_price,
            ],
            'customer_details' => [
                'first_name' => $booking->customer_name,
                'phone' => $booking->customer_phone,
            ],
        ];

        // Buat token Midtrans
        $snapToken = Snap::getSnapToken($transaction);

        return response()->json(['snapToken' => $snapToken]);
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
    
        if ($hashed != $request->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }
    
        // Ambil ID booking dari order_id Midtrans (ORDER-{id})
        $bookingId = str_replace('ORDER-', '', $request->order_id);
        $booking = Booking::find($bookingId);
    
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }
    
        // Update status berdasarkan transaksi Midtrans
        if (in_array($request->transaction_status, ['settlement', 'capture'])) {
            $booking->update([
                'payment_status' => 'paid',
                'status' => 'success', // Otomatis ubah ke "success" jika pembayaran berhasil
            ]);
        } elseif (in_array($request->transaction_status, ['cancel', 'expire', 'failure'])) {
            $booking->update([
                'payment_status' => 'failed',
                'status' => 'failed', // Otomatis ubah ke "failed" jika pembayaran gagal
            ]);
        }
    
        return response()->json(['message' => 'Payment and booking status updated']);
    }
    


    // public function callback(Request $request)
    // {
    //     $serverKey = config('midtrans.server_key');
    //     $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);

    //     if ($hashed != $request->signature_key) {
    //         return response()->json(['message' => 'Invalid signature'], 403);
    //     }

    //     $booking = Booking::where('midtrans_order_id', $request->order_id)->first();

    //     if (!$booking) {
    //         return response()->json(['message' => 'Booking not found'], 404);
    //     }

    //     if ($request->transaction_status == 'settlement' || $request->transaction_status == 'capture') {
    //         $booking->update(['payment_status' => 'paid']);
    //     } elseif ($request->transaction_status == 'cancel' || $request->transaction_status == 'expire' || $request->transaction_status == 'failure') {
    //         $booking->update(['payment_status' => 'failed']);
    //     }

    //     return response()->json(['message' => 'Payment status updated']);
    // }
}
