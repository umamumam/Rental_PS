@extends('layouts.app')

@section('title', 'Kalender Booking')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Kalender Booking</h2>
    <div class="card shadow p-4">
        <div id="calendar"></div>
    </div>
</div>

<!-- FullCalendar -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            events: {!! json_encode($events) !!},
            dateClick: function(info) {
                alert('Tanggal dipilih: ' + info.dateStr);
                document.getElementById('booking_date').value = info.dateStr;
            }
        });

        calendar.render();
    });
</script>
@endsection
