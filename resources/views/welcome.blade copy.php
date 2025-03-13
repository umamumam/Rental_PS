@extends('layouts1.app')

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
                    <a href="{{ route('book') }}" class="btn btn-primary">Pesan Sekarang</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
