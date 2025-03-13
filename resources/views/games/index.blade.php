@extends('layouts.app')

@section('title', 'Daftar Game')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Daftar Game</h2>
    <a href="{{ route('games.create') }}" class="btn btn-primary mb-3">Tambah Game</a>

    <div class="row">
        @foreach ($games as $game)
        <div class="col-md-4">
            <div class="card shadow-sm">
                <img src="{{ asset('storage/' . $game->image) }}" class="card-img-top" alt="{{ $game->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $game->name }}</h5>
                    {{-- <p class="card-text">Konsol: {{ $game->console }}</p>
                    <p class="card-text">Harga Sewa: Rp {{ number_format($game->rental_price) }}</p> --}}
                    <a href="{{ route('games.edit', $game->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('games.destroy', $game->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus game ini?')">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
