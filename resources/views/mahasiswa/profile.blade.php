<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil | E-Tugas</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #3730a3;
            --secondary: #10b981;
            --bg: #f8fafc;
            --text-main: #1e293b;
            --text-light: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--bg);
            color: var(--text-main);
        }

        /* NAVBAR */
        .navbar {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .navbar h2 {
            font-size: 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .back-btn {
            color: white;
            text-decoration: none;
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 16px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .back-btn:hover {
            background: white;
            color: var(--primary);
        }

        /* CONTAINER */
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 0 20px;
        }

        /* ALERT */
        .alert {
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
        }
        .alert-success { background: #dcfce7; color: #15803d; border: 1px solid #bbf7d0; }
        .alert-error { background: #fee2e2; color: #b91c1c; border: 1px solid #fecaca; }

        /* PROFILE CARD */
        .card {
            background: white;
            padding: 40px 30px;
            border-radius: 24px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .foto-wrapper {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto 20px;
        }

        .foto {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .role-badge {
            background: var(--primary);
            color: white;
            font-size: 10px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* FORM */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-light);
            margin-bottom: 8px;
            margin-left: 4px;
        }

        input {
            width: 100%;
            padding: 12px 16px;
            border-radius: 12px;
            border: 1.5px solid #e2e8f0;
            background: #f8fafc;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        input[type="file"] {
            padding: 8px;
            background: transparent;
            border: 1px dashed #cbd5e1;
            cursor: pointer;
        }

        button {
            width: 100%;
            padding: 14px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        button:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.3);
        }

        .helper-text {
            font-size: 11px;
            color: var(--text-light);
            margin-top: 5px;
            display: block;
        }
    </style>
</head>
<body>

<div class="navbar">
    <h2><i class="fas fa-user-circle"></i> Pengaturan Profil</h2>

    @if(auth()->user()->role == 'dosen')
        <a href="/dosen/dashboard" class="back-btn"><i class="fas fa-arrow-left"></i> Dashboard</a>
    @else
        <a href="/mahasiswa/dashboard" class="back-btn"><i class="fas fa-arrow-left"></i> Dashboard</a>
    @endif
</div>

<div class="container">

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="profile-header">
            <div class="foto-wrapper">
                @if(auth()->user()->photo)
                    <img src="{{ asset('storage/' . auth()->user()->photo) }}" class="foto">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=4f46e5&color=fff&size=120" class="foto">
                @endif
            </div>
            <span class="role-badge">{{ auth()->user()->role }}</span>
            <h3 style="margin-top: 10px;">{{ auth()->user()->name }}</h3>
        </div>

        {{-- FORM UPDATE --}}
        <form method="POST" 
              action="{{ auth()->user()->role == 'dosen' ? '/dosen/profile/update' : '/mahasiswa/profile/update' }}" 
              enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" value="{{ auth()->user()->name }}" required placeholder="Masukkan nama lengkap">
            </div>

            <div class="form-group">
                <label>Alamat Email</label>
                <input type="email" name="email" value="{{ auth()->user()->email }}" required placeholder="nama@email.com">
            </div>

            <div class="form-group">
                <label>Kata Sandi Baru</label>
                <input type="password" name="password" placeholder="••••••••">
                <span class="helper-text">*Kosongkan jika tidak ingin mengubah password</span>
            </div>

            <div class="form-group">
                <label>Foto Profil</label>
                <input type="file" name="photo" accept="image/*">
                <span class="helper-text">*Format: JPG, PNG (Max 2MB)</span>
            </div>

            <button type="submit">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </form>
    </div>
</div>

</body>
</html>