<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosen Dashboard | E-Tugas</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #3730a3;
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
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            background: var(--white);
            padding: 12px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .user-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            overflow: hidden;
            border: 2px solid #e2e8f0;
        }

        .avatar img { width: 100%; height: 100%; object-fit: cover; }

        .user-info p { font-size: 14px; font-weight: 700; color: var(--text-main); line-height: 1.2; }
        .user-info span { font-size: 11px; color: var(--primary); font-weight: 600; text-transform: uppercase; }

        .nav-right { display: flex; align-items: center; gap: 15px; }

        .btn-icon {
            padding: 8px 15px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-profile { background: #f1f5f9; color: var(--text-main); }
        .btn-logout { background: #fef2f2; color: #ef4444; border: none; cursor: pointer; }
        .btn-profile:hover { background: #e2e8f0; }

        /* CONTAINER */
        .container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }

        /* WELCOME HEADER */
        .welcome-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 30px;
        }

        .welcome-text h1 { font-size: 24px; font-weight: 700; }
        .welcome-text p { color: var(--text-light); font-size: 14px; }

        .btn-add {
            background: var(--primary);
            color: white;
            padding: 12px 20px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.3);
            transition: 0.3s;
        }

        .btn-add:hover { transform: translateY(-3px); box-shadow: 0 20px 25px -5px rgba(79, 70, 229, 0.4); }

        /* STATS GRID */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: var(--white);
            padding: 20px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            border: 1px solid #e2e8f0;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .icon-blue { background: #eff6ff; color: #3b82f6; }
        .icon-purple { background: #f5f3ff; color: #8b5cf6; }
        .icon-green { background: #f0fdf4; color: #22c55e; }

        .stat-info label { display: block; font-size: 12px; color: var(--text-light); font-weight: 500; }
        .stat-info span { font-size: 20px; font-weight: 700; color: var(--text-main); }

        /* KELAS GRID */
        .section-title { font-size: 18px; font-weight: 700; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; }
        
        .grid-kelas {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .card-kelas {
            background: var(--white);
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            padding: 25px;
            transition: 0.3s;
            position: relative;
            overflow: hidden;
        }

        .card-kelas:hover {
            transform: translateY(-5px);
            border-color: var(--primary);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
        }

        .card-kelas::after {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 5px;
            background: var(--primary);
        }

        .card-header { display: flex; justify-content: space-between; margin-bottom: 20px; }
        
        .class-icon-box {
            width: 45px; height: 45px;
            background: #f8fafc;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 18px; color: var(--primary);
        }

        .badge-aktif {
            background: #dcfce7; color: #166534;
            padding: 4px 12px; border-radius: 50px;
            font-size: 11px; font-weight: 700; height: fit-content;
        }

        .card-body h3 { font-size: 17px; font-weight: 700; margin-bottom: 4px; }
        .card-body p { font-size: 13px; color: var(--text-light); margin-bottom: 20px; }

        .card-footer {
            display: flex; justify-content: space-between; align-items: center;
            padding-top: 15px; border-top: 1px solid #f1f5f9;
        }

        .student-stats { font-size: 12px; color: var(--text-light); font-weight: 500; }
        .student-stats i { margin-right: 5px; color: var(--primary); }

        .btn-enter {
            color: var(--primary);
            text-decoration: none;
            font-weight: 700;
            font-size: 13px;
            display: flex; align-items: center; gap: 5px;
        }

        .btn-enter:hover { gap: 10px; }

        /* EMPTY STATE */
        .empty-box {
            grid-column: 1/-1;
            text-align: center;
            padding: 60px;
            background: white;
            border-radius: 20px;
            border: 2px dashed #e2e8f0;
        }

        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: 1fr; }
            .welcome-section { flex-direction: column; align-items: flex-start; gap: 20px; }
            .btn-add { width: 100%; justify-content: center; }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="user-left">
        <div class="avatar">
            @if(auth()->user()->photo)
                <img src="{{ asset('storage/' . auth()->user()->photo) }}">
            @else
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            @endif
        </div>
        <div class="user-info">
            <p>{{ auth()->user()->name }}</p>
            <span>Guru Pengajar</span>
        </div>
    </div>

    <div class="nav-right">
        <a href="/dosen/profile" class="btn-icon btn-profile">
            <i class="fas fa-user-circle"></i> Profil
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn-icon btn-logout">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
</nav>

<div class="container">
    
    <div class="welcome-section">
        <div class="welcome-text">
            <h1>Selamat Datang, Pak/Bu 👋</h1>
            <p>Kelola materi dan pantau tugas siswa dengan mudah.</p>
        </div>
        <a href="/dosen/kelas" class="btn-add">
            <i class="fas fa-plus-circle"></i> Tambah Kelas Baru
        </a>
    </div>

    <!-- STATS -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon icon-blue"><i class="fas fa-chalkboard"></i></div>
            <div class="stat-info">
                <label>Total Kelas</label>
                <span>{{ $kelas->count() }}</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon icon-purple"><i class="fas fa-users"></i></div>
            <div class="stat-info">
                <label>Total siswa</label>
                <span>{{ $kelas->sum(fn($k) => $k->mahasiswa_count ?? 0) }}</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon icon-green"><i class="fas fa-calendar-check"></i></div>
            <div class="stat-info">
                <label>Tahun Ajaran</label>
                <span>2024/2025</span>
            </div>
        </div>
    </div>

    <h2 class="section-title"><i class="fas fa-layer-group" style="color: var(--primary);"></i> Daftar Kelas Anda</h2>

    <div class="grid-kelas">
        @forelse($kelas as $k)
            <div class="card-kelas">
                <div class="card-header">
                    <div class="class-icon-box">
                        <i class="fas fa-book"></i>
                    </div>
                    <span class="badge-aktif">Aktif</span>
                </div>

                <div class="card-body">
                    <h3>{{ $k->nama_kelas }}</h3>
                    <p><i class="fas fa-key" style="font-size: 10px;"></i> Kode: <strong>{{ $k->kode_kelas }}</strong></p>
                </div>

                <div class="card-footer">
                    <span class="student-stats">
                        <i class="fas fa-user-graduate"></i> {{ $k->mahasiswa_count ?? 0 }} siswa
                    </span>
                    <a href="/dosen/kelas/{{ $k->id }}" class="btn-enter">
                        Kelola Kelas <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        @empty
            <div class="empty-box">
                <i class="fas fa-folder-open fa-3x" style="color: #cbd5e1; margin-bottom: 15px;"></i>
                <h4 style="color: var(--text-light);">Belum ada kelas yang dibuat</h4>
                <p style="font-size: 13px; color: #94a3b8;">Klik tombol 'Tambah Kelas' untuk mulai mengajar.</p>
            </div>
        @endforelse
    </div>

</div>

</body>
</html>