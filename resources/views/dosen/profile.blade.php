<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil | E-Tugas</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #3730a3;
            --secondary: #10b981;
            --bg: #f8fafc;
            --white: #ffffff;
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
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            background: var(--white);
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .navbar h2 {
            font-size: 18px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--primary);
        }

        .btn-back {
            background: #f1f5f9;
            color: var(--text-main);
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
        }

        .btn-back:hover {
            background: var(--secondary);
            color: white;
        }

        /* CONTAINER */
        .container {
            max-width: 550px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* CARD */
        .card {
            background: var(--white);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
            border: 1px solid #f1f5f9;
            text-align: center;
        }

        /* FOTO SECTION */
        .profile-img-container {
            position: relative;
            width: 130px;
            height: 130px;
            margin: 0 auto 30px;
        }

        .foto {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #fff;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
        }

        .status-role {
            display: inline-block;
            background: #eef2ff;
            color: var(--primary);
            font-size: 11px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        /* FORM STYLING */
        .form-group {
            text-align: left;
            margin-bottom: 20px;
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
            transition: 0.3s;
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

        /* BUTTON */
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.4);
        }

        .btn-submit:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* ALERTS */
        .alert {
            padding: 14px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
        }
        .success { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; }
        .error { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }

        .helper-text {
            font-size: 11px;
            color: var(--text-light);
            margin-top: 5px;
            display: block;
        }
    </style>
</head>
<body>

<nav class="navbar">
    <h2><i class="fas fa-user-pen"></i> Edit Profil</h2>

    @if(auth()->user()->role == 'dosen')
        <a href="/dosen/dashboard" class="btn-back">
            <i class="fas fa-arrow-left"></i> Dashboard
        </a>
    @else
        <a href="/mahasiswa/dashboard" class="btn-back">
            <i class="fas fa-arrow-left"></i> Dashboard
        </a>
    @endif
</nav>

<div class="container">

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="alert success">✅ {{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert error">❌ {{ session('error') }}</div>
    @endif

    <div class="card">
        
        <div class="profile-img-container">
            @if(auth()->user()->photo)
                <img src="{{ asset('storage/' . auth()->user()->photo) }}" class="foto">
            @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=4f46e5&color=fff&size=130" class="foto">
            @endif
        </div>

        <span class="status-role">{{ auth()->user()->role }}</span>
        <h3 style="margin-bottom: 30px;">{{ auth()->user()->name }}</h3>

        {{-- FORM UPDATE --}}
        <form method="POST" 
              action="{{ auth()->user()->role == 'dosen' ? '/dosen/profile/update' : '/mahasiswa/profile/update' }}" 
              enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" value="{{ auth()->user()->name }}" required>
            </div>

            <div class="form-group">
                <label>Alamat Email</label>
                <input type="email" name="email" value="{{ auth()->user()->email }}" required>
            </div>

            <div class="form-group">
                <label>Ganti Password</label>
                <input type="password" name="password" placeholder="Masukan password baru jika ingin diganti">
                <span class="helper-text">*Kosongkan jika tidak ingin mengubah password</span>
            </div>

            <div class="form-group">
                <label>Foto Profil Baru</label>
                <input type="file" name="photo" accept="image/*">
                <span class="helper-text">*Format: JPG, PNG (Maks. 2MB)</span>
            </div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </form>

    </div>
</div>

</body>
</html>