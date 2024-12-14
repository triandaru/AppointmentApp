<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/style.css') }}">
    <title>Buat Janji Temu</title>
</head>

<body>
    <h1>Buat Janji Temu</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf
        <label for="title">Judul:</label>
        <input type="text" id="title" name="title" required><br><br>
        <label for="start">Waktu Mulai:</label>
        <input type="datetime-local" id="start" name="start" required><br><br>
        <label for="end">Waktu Selesai:</label>
        <input type="datetime-local" id="end" name="end" required><br><br>
        <label for="participants">Peserta:</label>
        <select name="participants[]" id="participants" multiple required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>

</html>
