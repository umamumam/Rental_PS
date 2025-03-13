@extends('layouts.app')

@section('title', 'Dashboard - Rental PS')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Dashboard Admin</h2>
    <!-- Form Filter -->
    <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
        <div class="row g-2">
            <div class="col-md-3">
                <input type="text" name="customer_name" class="form-control" placeholder="Cari Nama Pelanggan" value="{{ request('customer_name') }}">
            </div>
            <div class="col-md-3">
                <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
            </div>
            <div class="col-md-3">
                <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Cari
                </button>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-sync"></i> Reset
                </a>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Nama Pelanggan</th>
                    <th>No. HP</th>
                    <th>Layanan</th>
                    <th>Tanggal</th>
                    <th>Sesi</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $index => $booking)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $booking->customer_name }}</td>
                        <td>{{ $booking->customer_phone }}</td>
                        <td>{{ $booking->service->name }}</td>
                        <td class="text-center">{{ $booking->booking_date }}</td>
                        <td class="text-center">{{ $booking->sessions }}</td>
                        <td class="text-end">Rp {{ number_format($booking->total_price) }}</td>
                        <td class="text-center">
                            <span class="badge 
                                @if($booking->status == 'pending') text-bg-warning
                                @elseif($booking->status == 'success') text-bg-success
                                @elseif($booking->status == 'failed') text-bg-danger
                                @else text-bg-secondary @endif">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex gap-2 justify-content-center">
                                <!-- Edit Button -->
                                <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <!-- Delete Button (Modal Trigger) -->
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $booking->id }}">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>

                                <!-- Status Dropdown -->
                                {{-- <form action="{{ route('bookings.updateStatus', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                        <option value="pending" @if($booking->status == 'pending') selected @endif>Pending</option>
                                        <option value="success" @if($booking->status == 'success') selected @endif>Success</option>
                                        <option value="failed" @if($booking->status == 'failed') selected @endif>Failed</option>
                                        <option value="cancel" @if($booking->status == 'cancel') selected @endif>Cancel</option>
                                    </select>
                                </form> --}}

                                <!-- Pay Now Button (Hidden if Success) -->
                                @if($booking->status != 'success')
                                    <button class="btn btn-success btn-sm pay-now" data-id="{{ $booking->id }}">
                                        <i class="fas fa-money-bill-wave"></i> &nbsp;Bayar
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>

                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteModal{{ $booking->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus booking ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Delete Modal -->

                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $bookings->links('pagination::bootstrap-5') }}
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    document.querySelectorAll('.pay-now').forEach(button => {
        button.addEventListener('click', function () {
            let bookingId = this.getAttribute('data-id');

            fetch('{{ route("payment.process") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ booking_id: bookingId })
            })
            .then(response => response.json())
            .then(data => {
                window.snap.pay(data.snapToken, {
                    onSuccess: function(result) {
                        alert('Pembayaran sukses!');
                        location.reload();
                    },
                    onPending: function(result) {
                        alert('Menunggu pembayaran...');
                    },
                    onError: function(result) {
                        alert('Pembayaran gagal.');
                    }
                });
            });
        });
    });
</script>
@endsection
