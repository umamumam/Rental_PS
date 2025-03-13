@extends('layouts.app')

@section('title', 'Rental PS - Booking Sekarang!')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Pilih Layanan Rental PS</h2>

    <div class="row">
        @foreach (\App\Models\Service::all() as $service)
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top" alt="{{ $service->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $service->name }}</h5>
                    <p class="card-text">Harga: Rp {{ number_format($service->price) }} per sesi</p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal" 
                        onclick="setService({{ $service->id }}, '{{ $service->name }}', {{ $service->price }})">
                        Pesan Sekarang
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal Form Booking -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Form Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('book') }}" method="POST">
                    @csrf
                    <input type="hidden" name="service_id" id="service_id">
                    <input type="hidden" id="base_price">

                    <div class="mb-3">
                        <label for="service_name" class="form-label">Layanan</label>
                        <input type="text" id="service_name" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Nama</label>
                        <input type="text" name="customer_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="customer_phone" class="form-label">Nomor HP</label>
                        <input type="text" name="customer_phone" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="booking_date" class="form-label">Tanggal Booking</label>
                        <input type="date" name="booking_date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="sessions" class="form-label">Jumlah Sesi</label>
                        <input type="number" name="sessions" id="sessions" class="form-control" min="1" value="1" required onkeyup="updateTotalPrice()" onchange="updateTotalPrice()">
                    </div>

                    <div class="mb-3">
                        <label for="total_price" class="form-label">Total Harga</label>
                        <input type="text" id="total_price" class="form-control" readonly>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Konfirmasi Booking</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk Mengisi Modal dan Menghitung Total Harga -->
<script>
    function setService(id, name, price) {
        document.getElementById('service_id').value = id;
        document.getElementById('service_name').value = name;
        document.getElementById('base_price').value = price;
        document.getElementById('sessions').value = 1;
        updateTotalPrice();
    }

    function updateTotalPrice() {
        let basePrice = parseFloat(document.getElementById('base_price').value);
        let sessions = parseInt(document.getElementById('sessions').value) || 1;
        let totalPrice = basePrice * sessions;
        document.getElementById('total_price').value = 'Rp ' + totalPrice.toLocaleString();
    }
</script>

@endsection
