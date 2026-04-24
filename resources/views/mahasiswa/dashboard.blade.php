<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa | E-Tugas</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #3730a3;
            --secondary: #10b981;
            --bg-body: #f8fafc;
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
            background-color: var(--bg-body);
            color: var(--text-main);
        }

        /* NAVBAR */
        .navbar {
            background: var(--white);
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .user-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .foto-container {
            position: relative;
        }

        .foto {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            object-fit: cover;
            border: 2px solid var(--primary);
            padding: 2px;
        }

        .user-info strong {
            display: block;
            font-size: 16px;
            color: var(--text-main);
        }

        .user-info span {
            font-size: 12px;
            color: var(--text-light);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .nav-right {
            display: flex;
            gap: 12px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-profile {
            background: #f1f5f9;
            color: var(--text-main);
        }

        .btn-profile:hover {
            background: #e2e8f0;
        }

        .btn-logout {
            background: #fef2f2;
            color: #ef4444;
        }

        .btn-logout:hover {
            background: #fee2e2;
        }

        /* CONTAINER */
        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* ALERTS */
        .alert {
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
        }
        .alert-success { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; }
        .alert-error { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }

        /* HEADER SECTION */
        .section-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* JOIN CLASS CARD */
        .card-join {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 30px;
            border-radius: 20px;
            color: white;
            margin-bottom: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 10px 25px -5px rgba(79, 70, 229, 0.4);
        }

        .join-content h3 { font-size: 22px; margin-bottom: 5px; }
        .join-content p { opacity: 0.8; font-size: 14px; }

        .join-form {
            display: flex;
            gap: 10px;
            background: rgba(255, 255, 255, 0.1);
            padding: 8px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }

        .join-form input {
            padding: 12px 15px;
            border-radius: 10px;
            border: none;
            width: 200px;
            font-weight: 500;
            outline: none;
        }

        .btn-join {
            background: var(--secondary);
            color: white;
            border: none;
            padding: 0 25px;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-join:hover { background: #059669; }

        /* GRID KELAS */
        .kelas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
        }

        .kelas-card {
            background: var(--white);
            border-radius: 20px;
            padding: 25px;
            position: relative;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .kelas-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
            border-color: var(--primary);
        }

        .kelas-icon {
            width: 50px;
            height: 50px;
            background: #eef2ff;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 20px;
        }

        .kelas-card h4 {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-main);
        }

        .kode-badge {
            background: #f1f5f9;
            color: var(--text-light);
            padding: 4px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            width: fit-content;
        }

        .btn-masuk {
            margin-top: 10px;
            width: 100%;
            padding: 12px;
            background: #f8fafc;
            color: var(--primary);
            border: 1.5px solid var(--primary);
            border-radius: 12px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-masuk:hover {
            background: var(--primary);
            color: white;
        }

        .empty-state {
            text-align: center;
            padding: 60px;
            background: var(--white);
            border-radius: 20px;
            grid-column: 1 / -1;
            border: 2px dashed #cbd5e1;
        }

        .empty-state i {
            font-size: 50px;
            color: #cbd5e1;
            margin-bottom: 15px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .navbar { padding: 15px 20px; }
            .card-join { flex-direction: column; gap: 20px; text-align: center; }
            .join-form { width: 100%; flex-direction: column; }
            .join-form input { width: 100%; }
            .nav-right span { display: none; }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="user-left">
        <div class="foto-container">
            @if(auth()->user()->photo)
                <img src="{{ asset('storage/' . auth()->user()->photo) }}" class="foto">
            @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=4f46e5&color=fff" class="foto">
            @endif
        </div>
        <div class="user-info">
            <strong>{{ auth()->user()->name }}</strong>
            <span>siswa</span>
        </div>
    </div>

    <div class="nav-right">
        <a href="/mahasiswa/profile" class="btn btn-profile">
            <i class="fas fa-user-gear"></i> <span>Profil</span>
        </a>
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-logout">
                <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
            </button>
        </form>
    </div>
</nav>

<div class="container">

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-circle-check"></i> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            <i class="fas fa-circle-xmark"></i> {{ session('error') }}
        </div>
    @endif

    {{-- JOIN KELAS --}}
    <div class="card-join">
        <div class="join-content">
            <h3>Gabung Kelas Baru</h3>
            <p>Masukkan kode kelas yang diberikan oleh guru Anda.</p>
        </div>

        <form method="POST" action="/mahasiswa/join-kelas" class="join-form">
            @csrf
            <input type="text" name="kode_kelas" placeholder="Cari Kelas" required>
            <button type="submit" class="btn-join">Gabung Sekarang</button>
        </form>
    </div>

    {{-- DAFTAR KELAS --}}
    <h3 class="section-title"><i class="fas fa-book-bookmark" style="color: var(--primary);"></i> Kelas Saya</h3>

    <div class="kelas-grid">
        @forelse($kelas as $k)
            <div class="kelas-card">
                <div class="kelas-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div>
                    <h4>{{ $k->nama_kelas }}</h4>
                    <div class="kode-badge">ID: {{ $k->kode_kelas }}</div>
                </div>
                
                <a href="/mahasiswa/kelas/{{ $k->id }}" class="btn-masuk">
                    Buka Kelas
                </a>
            </div>
        @empty
            <div class="empty-state">
                <i class="fas fa-folder-open"></i>
                <h4>Belum Ada Kelas</h4>
                <p style="color: var(--text-light);">Silakan gunakan fitur gabung kelas di atas untuk memulai.</p>
            </div>
        @endforelse
    </div>

</div>

</body>
</html>