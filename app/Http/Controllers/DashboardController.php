<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Game;
use App\Models\User;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with('service');

        if ($request->filled('customer_name')) {
            $query->where('customer_name', 'like', '%' . $request->customer_name . '%');
        }

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('booking_date', [$request->start_date, $request->end_date]);
        } elseif ($request->filled('start_date')) {
            $query->whereDate('booking_date', '>=', $request->start_date);
        } elseif ($request->filled('end_date')) {
            $query->whereDate('booking_date', '<=', $request->end_date);
        }

        $bookings = $query->latest()->paginate(10);

        return view('dashboard.index', compact('bookings'));
    }

    public function home(Request $request)
    {
        // Total transaksi, service, game, dan user
        $totalTransaksi = Booking::count();
        $totalService = Service::count();
        $totalGame = Game::count();
        $totalUser = User::count();

        // Menghitung transaksi per hari
        $transactionsPerDay = Booking::selectRaw('DATE(booking_date) as day, count(*) as total')
            ->groupBy('day')
            ->whereYear('booking_date', Carbon::now()->year)
            ->get();

        $days = $transactionsPerDay->pluck('day');
        $transactionCounts = $transactionsPerDay->pluck('total');

        // Menghitung pendapatan harian berdasarkan booking_date hari ini
        $pendapatanHarian = Booking::whereDate('booking_date', Carbon::today())
            ->sum('total_price');

        $chart = new Chart;
        $chart->labels($days);
        $chart->dataset('Jumlah Transaksi', 'line', $transactionCounts)
            ->color('#ff0000')
            ->backgroundColor('rgba(255, 0, 0, 0.1)');

        return view('dashboard.home', compact('totalTransaksi', 'totalService', 'totalGame', 'totalUser', 'transactionsPerDay', 'days', 'transactionCounts', 'chart', 'pendapatanHarian'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $services = Service::all(); // Ambil semua layanan untuk pilihan di form
        return view('dashboard.edit', compact('booking', 'services'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:15',
            'booking_date' => 'required|date',
            'sessions' => 'required|integer|min:1',
        ]);

        $service = Service::findOrFail($request->service_id);
        $total_price = $service->price * $request->sessions;

        // Tambahan biaya jika booking dilakukan pada hari Sabtu atau Minggu
        $day = date('l', strtotime($request->booking_date));
        if ($day == 'Saturday' || $day == 'Sunday') {
            $total_price += 50000;
        }

        $booking = Booking::findOrFail($id);
        $booking->update([
            'service_id' => $request->service_id,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'booking_date' => $request->booking_date,
            'sessions' => $request->sessions,
            'total_price' => $total_price,
        ]);

        return redirect()->route('dashboard')->with('success', 'Booking berhasil diperbarui.');
    }

    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        // Jika pembayaran sudah "paid", otomatis set status ke "success"
        if ($booking->payment_status === 'paid') {
            $booking->update(['status' => 'success']);
        } else {
            $booking->update(['status' => $request->status]);
        }

        return redirect()->route('dashboard')->with('success', 'Status booking diperbarui.');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('dashboard')->with('success', 'Booking berhasil dihapus.');
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
}
