@extends('layouts.app')

@section('title', 'Tambah Layanan')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm p-4">
        <!-- Header -->
        <div class="card-header text-center d-flex justify-content-between align-items-center"
            style="background: linear-gradient(90deg, #28a745, #218838); color: white; border-radius: 5px;">
            <h4 style="color: white"><i class="fas fa-plus-circle me-2"></i> Tambah Layanan</h4>
        </div>

        <!-- Form -->
        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mt-3">
                <div class="col-md-12 mb-3">
                    <label class="form-label">Nama Layanan</label>
                    <input type="text" name="name" class="form-control shadow-sm" required>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="price" class="form-control shadow-sm" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="image" class="form-control shadow-sm">
                </div>
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-success mt-3 shadow">
                <i class="fas fa-save me-2"></i> Simpan
            </button>
            <a href="{{ route('services.index') }}" class="btn btn-secondary mt-3 shadow">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>
        </form>
    </div>
</div>
@endsection
