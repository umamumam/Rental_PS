@extends('layouts.app')

@section('title', 'Edit Layanan')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm p-4">
        <!-- Header -->
        <div class="card-header text-center d-flex justify-content-between align-items-center"
            style="background: linear-gradient(90deg, #ffc107, #ff9800); color: white; border-radius: 5px;">
            <h4 style="color: white"><i class="fas fa-edit me-2"></i> Edit Layanan</h4>
        </div>

        <!-- Form -->
        <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mt-3">
                <div class="col-md-12 mb-3">
                    <label class="form-label">Nama Layanan</label>
                    <input type="text" name="name" class="form-control shadow-sm" value="{{ $service->name }}" required>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="price" class="form-control shadow-sm" value="{{ $service->price }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Gambar Saat Ini</label>
                    <br>
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="img-thumbnail" width="200">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12 mb-3">
                    <label class="form-label">Ganti Gambar (Opsional)</label>
                    <input type="file" name="image" class="form-control shadow-sm">
                </div>
            </div>

            <!-- Tombol Update -->
            <button type="submit" class="btn btn-warning mt-3 shadow">
                <i class="fas fa-save me-2"></i> Update
            </button>
            <a href="{{ route('services.index') }}" class="btn btn-secondary mt-3 shadow">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>
        </form>
    </div>
</div>
@endsection
