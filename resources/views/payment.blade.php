@extends('layouts1.app')

@section('title', 'Pembayaran')

@section('content')
<div class="container text-center">
    <h2>Pembayaran Booking</h2>
    <p>Silakan selesaikan pembayaran untuk booking Anda.</p>
    
    <button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
document.getElementById('pay-button').addEventListener('click', function () {
    snap.pay("{{ $snapToken }}", {
        onSuccess: function(result) {
            alert("Pembayaran sukses!");
            window.location.href = "{{ route('dashboard') }}"; 
        },
        onPending: function(result) {
            alert("Menunggu pembayaran...");
        },
        onError: function(result) {
            alert("Pembayaran gagal!");
        }
    });
});
</script>
@endsection
