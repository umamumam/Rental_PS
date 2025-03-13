<button class="btn btn-success pay-now" data-id="{{ $booking->id }}">Bayar Sekarang</button>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    document.querySelectorAll('.pay-now').forEach(button => {
        button.addEventListener('click', function () {
            let bookingId = this.getAttribute('data-id');

            fetch('{{ route("payment.process") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ booking_id: bookingId })
            })
            .then(response => response.json())
            .then(data => {
                window.snap.pay(data.snapToken, {
                    onSuccess: function(result) {
                        alert('Pembayaran sukses!');
                        location.reload();
                    },
                    onPending: function(result) {
                        alert('Menunggu pembayaran...');
                    },
                    onError: function(result) {
                        alert('Pembayaran gagal.');
                    }
                });
            });
        });
    });
</script>
