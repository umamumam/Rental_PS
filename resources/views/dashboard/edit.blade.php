@extends('layouts.app')

@section('title', 'Edit Booking')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm p-4">
        <!-- Header -->
        <div class="card-header text-center d-flex justify-content-between align-items-center"
            style="background: linear-gradient(90deg, #28a745, #218838); color: white; border-radius: 5px;">
            <h4 style="color: white"><i class="fas fa-edit me-2"></i> Edit Booking</h4>
        </div>

        <!-- Form -->
        <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mt-3">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Pelanggan</label>
                    <input type="text" name="customer_name" class="form-control shadow-sm" 
                        value="{{ old('customer_name', $booking->customer_name) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">No. HP</label>
                    <input type="text" name="customer_phone" class="form-control shadow-sm" 
                        value="{{ old('customer_phone', $booking->customer_phone) }}" required>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12 mb-3">
                    <label class="form-label">Layanan</label>
                    <select name="service_id" class="form-control shadow-sm" required>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ $booking->service_id == $service->id ? 'selected' : '' }}>
                                {{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="booking_date" class="form-control shadow-sm" 
                        value="{{ old('booking_date', $booking->booking_date) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Sesi</label>
                    <input type="number" name="sessions" class="form-control shadow-sm" 
                        value="{{ old('sessions', $booking->sessions) }}" required>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12 mb-3">
                    <label class="form-label">Total Harga</label>
                    <input type="number" name="total_price" class="form-control shadow-sm" 
                        value="{{ old('total_price', $booking->total_price) }}" required>
                </div>
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-success mt-3 shadow">
                <i class="fas fa-save me-2"></i> Simpan Perubahan
            </button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3 shadow">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>
        </form>
    </div>
</div>
@endsection
