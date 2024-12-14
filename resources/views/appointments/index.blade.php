<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.css" rel="stylesheet">
    <title>Daftar Janji Temu</title>
</head>

<body>
    <h1>Daftar Janji Temu</h1>
    <a href="{{ route('appointments.create') }}">Buat Janji Temu Baru</a>

    <!-- FullCalendar container -->
    <div id="calendar"></div>

    <ul>
        @foreach ($appointments as $appointment)
            <li>
                <strong>{{ $appointment->title }}</strong><br>
                Creator: {{ $appointment->creator_id }}<br>
                Mulai: {{ $appointment->start }}<br>
                Selesai: {{ $appointment->end }}
            </li>
        @endforeach
    </ul>

    <!-- jQuery (harus dimuat sebelum FullCalendar) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.js"></script>

    <script>
        $(document).ready(function() {
            // Mengambil data janji temu dari server dan menampilkannya di kalender
            var appointments = @json($appointments); // Menampilkan data appointments dalam format JSON

            $('#calendar').fullCalendar({
                events: appointments.map(function(appointment) {
                    return {
                        title: appointment.title,
                        start: appointment.start, // Pastikan format waktu sudah sesuai
                        end: appointment.end,
                    };
                }),
            });
        });
    </script>
</body>

</html>
