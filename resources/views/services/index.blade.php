@extends('layouts.app')

@section('title', 'Daftar Layanan')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Daftar Layanan</h2>
    
    <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Tambah Layanan</a>
    <div class="row">
        @foreach (\App\Models\Service::all() as $service)
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg rounded border-0 overflow-hidden">
                <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top" alt="{{ $service->name }}" style="height: 350px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">{{ $service->name }}</h5>
                    <p class="card-text text-muted">Harga: <span class="text-danger fw-bold">Rp {{ number_format($service->price) }}</span> per sesi</p>
                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- <div class="row">
        @foreach ($services as $service)
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top" alt="{{ $service->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $service->name }}</h5>
                    <p class="card-text">Harga: Rp {{ number_format($service->price) }}</p>
                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div> --}}
</div>
@endsection
