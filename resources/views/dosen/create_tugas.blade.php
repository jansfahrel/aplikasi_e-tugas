<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tugas</title>
</head>
<body>

    <h1>Tambah Tugas</h1>

    <form action="/dosen/tugas/store" method="POST">
        @csrf

        <label>Judul Tugas</label><br>
        <input type="text" name="judul"><br><br>

        <label>Deskripsi</label><br>
        <textarea name="deskripsi"></textarea><br><br>

        <label>Deadline</label><br>
        <input type="datetime-local" name="deadline"><br><br>

        <button type="submit">Simpan Tugas</button>
    </form>

</body>
</html>