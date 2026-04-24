<!DOCTYPE html>
<html>
<head>
    <title>Edit Profil</title>
</head>
<body>

<h2>Edit Profil</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST" 
      action="{{ auth()->user()->role == 'dosen' ? '/dosen/profile/update' : '/mahasiswa/profile/update' }}" 
      enctype="multipart/form-data">
    @csrf

    <input type="text" name="name" value="{{ auth()->user()->name }}"><br><br>
    <input type="email" name="email" value="{{ auth()->user()->email }}"><br><br>

    <input type="password" name="password" placeholder="Password baru"><br><br>

    <input type="file" name="photo"><br><br>

    <button>Simpan</button>
</form>

</body>
</html>