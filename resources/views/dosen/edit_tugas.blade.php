<!DOCTYPE html>
<html>
<head>
    <title>Edit Tugas</title>
</head>
<body>

    <h1>Edit Tugas</h1>

    <form action="/dosen/tugas/{{ $tugas->id }}/update" method="POST">
        @csrf

        <label>Judul Tugas</label><br>
        <input type="text" name="judul" value="{{ $tugas->judul }}"><br><br>

        <label>Deskripsi</label><br>
        <textarea name="deskripsi">{{ $tugas->deskripsi }}</textarea><br><br>

        <label>Deadline</label><br>
        <input type="datetime-local" name="deadline"
            value="{{ \Carbon\Carbon::parse($tugas->deadline)->format('Y-m-d\TH:i') }}"><br><br>

        <button type="submit">Update Tugas</button>
    </form>

</body>
</html>