<div class="container text-center">
    <h2>Konfirmasi Pembayaran</h2>
    <p>Silakan lakukan pembayaran untuk menyelesaikan booking Anda.</p>

    <button id="pay-button" class="btn btn-success">Bayar Sekarang</button>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
        document.getElementById('pay-button').onclick = function () {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function (result) {
                    window.location.href = "{{ route('booking.success', $booking->id) }}";
                },
                onPending: function (result) {
                    alert('Pembayaran tertunda. Silakan cek status transaksi.');
                },
                onError: function (result) {
                    alert('Pembayaran gagal!');
                }
            });
        };
    </script>
</div>