@extends('layouts.app')

@section('title', 'Tambah Game')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm p-4">
        <!-- Header -->
        <div class="card-header text-center d-flex justify-content-between align-items-center"
            style="background: linear-gradient(90deg, #007bff, #0056b3); color: white; border-radius: 5px;">
            <h4 style="color: white"><i class="fas fa-gamepad me-2"></i> Tambah Game</h4>
        </div>

        <!-- Form -->
        <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mt-3">
                <div class="col-md-12 mb-3">
                    <label for="name" class="form-label">Nama Game</label>
                    <input type="text" class="form-control shadow-sm" id="name" name="name" required>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="file" class="form-control shadow-sm" id="image" name="image">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control shadow-sm" id="description" name="description"></textarea>
                </div>
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary mt-3 shadow">
                <i class="fas fa-save me-2"></i> Simpan
            </button>
            <a href="{{ route('games.index') }}" class="btn btn-secondary mt-3 shadow">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>
        </form>
    </div>
</div>
@endsection
